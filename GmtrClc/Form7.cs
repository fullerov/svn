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
    public partial class Form7 : Form
    {
        StreamWriter wr = new StreamWriter("Круг.txt");

        public Form7()
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

                r1 = Math.PI * Math.Pow(r,2);
                r2 = 2 * Math.PI * r;

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);

                label6.Text = s1;
                label7.Text = s2;

                wr.WriteLine("Радиус r = " + rs);
                wr.WriteLine("Площадь = " + s1);
                wr.WriteLine("Периметр = " + s2);
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
            MessageBox.Show("Результат вычислений круга сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label8_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
