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
    public partial class Form16 : Form
    {
        StreamWriter wr = new StreamWriter("Конус.txt");

        public Form16()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double h, r, l, r1,r2;
                string h1 = textBox1.Text;
                string rs = textBox2.Text;
                string l1 = textBox3.Text;

                h = Convert.ToDouble(h1);
                r = Convert.ToDouble(rs);
                l = Convert.ToDouble(l1);

                r1 = 0.3333 * Math.PI * Math.Pow(r, 2) * h;
                r2 = Math.PI * r * l;

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);

                label8.Text = s1;
                label9.Text = s2;

                label5.Visible = true;
                label6.Visible = true;
                label7.Visible = true;
                label8.Visible = true;
                label9.Visible = true;
                button2.Visible = true;

                wr.WriteLine("Радиус r = " + rs);
                wr.WriteLine("Высота h = " + h1);
                wr.WriteLine("Сторона l = " + l1);
                wr.WriteLine("Объём = " + s1);
                wr.WriteLine("Площадь боковой поверхности = "+s2);
                wr.WriteLine();

            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }


        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений конуса сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label11_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
