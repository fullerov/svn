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
    public partial class Form13 : Form
    {
        StreamWriter wr = new StreamWriter("Параллелепипед.txt");

        public Form13()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double A, h, a, b, c, r1, r2;
                string A1 = textBox1.Text;
                string h1 = textBox2.Text;
                string a1 = textBox3.Text;
                string b1 = textBox4.Text;
                string c1 = textBox5.Text;

                A = Convert.ToDouble(A1);
                h = Convert.ToDouble(h1);
                a = Convert.ToDouble(a1);
                b = Convert.ToDouble(b1);
                c = Convert.ToDouble(c1);

                r1 = A * h;
                r2 = 4 * a + 4 * b + 4 * c;

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);

                label10.Text = s1;
                label11.Text = s2;

                label4.Visible = true;
                label5.Visible = true;
                label6.Visible = true;
                label7.Visible = true;
                label8.Visible = true;
                label9.Visible = true;
                label10.Visible = true;
                label11.Visible = true;
                button2.Visible = true;
                label13.Visible = true;

                wr.WriteLine("Длина А = " + A1);
                wr.WriteLine("Высота h = " + h1);
                wr.WriteLine("Объём = " + s1);
                wr.WriteLine("-----------");
                wr.WriteLine("Сторона а = " + a1);
                wr.WriteLine("Cторона b = " + b1);
                wr.WriteLine("Сторона с = " + c1);
                wr.WriteLine("Периметр = " + s2);
                wr.WriteLine();


            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений параллелепипеда сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label14_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
