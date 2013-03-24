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
    public partial class Form14 : Form
    {
        StreamWriter wr = new StreamWriter("Прямоугольный параллелепипед.txt");

        public Form14()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double a, b, c, r1, r2, r3;
                string a1 = textBox1.Text;
                string b1 = textBox2.Text;
                string c1 = textBox3.Text;

                a = Convert.ToDouble(a1);
                b = Convert.ToDouble(b1);
                c = Convert.ToDouble(c1);

                r1 = a * b * c;
                r2 = 2 * (a * b + a * c + b * c);
                r3 = 4 * a + 4 * b + 4 * c;

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);
                string s3 = Convert.ToString(r3);

                label8.Text = s1;
                label9.Text = s2;
                label11.Text = s3;

                label5.Visible = true;
                label6.Visible = true;
                label7.Visible = true;
                label8.Visible = true;
                label9.Visible = true;
                label10.Visible = true;
                label11.Visible = true;
                button2.Visible = true;

                wr.WriteLine("Длина а = " + a1);
                wr.WriteLine("Высота b = " + b1);
                wr.WriteLine("Ширина с = " + c1);
                wr.WriteLine("Объём = " + s1);
                wr.WriteLine("Площадь поверхности = " + s2);
                wr.WriteLine("Периметр = " + s3);
                wr.WriteLine();
            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений прямоугольного параллелепипеда сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label12_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
