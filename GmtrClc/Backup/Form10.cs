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
    public partial class Form10 : Form
    {
        StreamWriter wr = new StreamWriter("Многоугольник.txt");

        public Form10()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double n, b, r1, r2;
                string ns = textBox1.Text;
                string bs = textBox2.Text;
               
                n = Convert.ToDouble(ns);
                b = Convert.ToDouble(bs);
                

                r1 = 0.25 * n * Math.Pow(b, 2)*(Math.Cos(Math.PI/n)/(Math.Sin(Math.PI/n))); 
                r2 = n * b;

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);

                label7.Text = s1;
                label8.Text = s2;

                label4.Visible = true;
                label5.Visible = true;
                label6.Visible = true;
                label7.Visible = true;
                label8.Visible = true;
                button2.Visible = true;

                wr.WriteLine("Количество углов = " + ns);
                wr.WriteLine("Длина стороны = " + bs);
                wr.WriteLine("Площадь = " + s1);
                wr.WriteLine("Периметр = " + s2);
                wr.WriteLine();

            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
            MessageBox.Show("Результат вычислений многоугольника сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label14_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
