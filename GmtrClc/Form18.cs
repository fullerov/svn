using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using System.IO;

namespace WindowsFormsApplication7
{
    public partial class Form18 : Form
    {
        StreamWriter wr = new StreamWriter("Сфера.txt");

        public Form18()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double r, r1, r2;
                string rs = textBox1.Text;

                r = Convert.ToDouble(rs);

                r1 = 1.3333 * Math.PI * Math.Pow(r, 3);
                r2 = 4 * Math.PI * Math.Pow(r, 2);

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);

                label6.Text = s1;
                label7.Text = s2;

                wr.WriteLine("Радиус = "+rs);
                wr.WriteLine("Объём = " + s1);
                wr.WriteLine("Площадь поверхности = " + s2);
                wr.WriteLine();

                label3.Visible = true;
                label4.Visible = true;
                label5.Visible = true;
                label6.Visible = true;
                label7.Visible = true;
                button2.Visible = true;


            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }

        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений сферы сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label9_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
