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
    public partial class Form4 : Form
    {
        StreamWriter wr = new StreamWriter("Треугольник.txt");

        public Form4()
        {
            InitializeComponent();
        }

        private void Form4_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double a, b, c, h,r2,r3;
                string a1 = textBox1.Text;
                string b1 = textBox2.Text;
                string c1 = textBox3.Text;
                string h1 = textBox4.Text;
            

                a = Convert.ToDouble(a1);
                b = Convert.ToDouble(b1);
                c = Convert.ToDouble(c1);
                h = Convert.ToDouble(h1);

                r2 = a + b + c;
                r3=0.5*h*b;

                string s2 = Convert.ToString(r2);
                string s3=Convert.ToString(r3);
            
                label10.Text = s2;
                label13.Text=s3;

                wr.WriteLine("Катет а = " + a1);
                wr.WriteLine("Катет c = " + c1);
                wr.WriteLine("Гипотенуза b = " + b1);
                wr.WriteLine("Высота h = " + h1);
                wr.WriteLine("Периметр = " + s2);
                wr.WriteLine("Площадь = " + s3);
           
                wr.WriteLine();

                label7.Visible = true;
                label9.Visible = true;
                label10.Visible = true;
                label12.Visible = true;
                label13.Visible = true;
                button2.Visible = true;

            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            wr.Close();
            
            MessageBox.Show("Результат вычислений треугольника сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label6_Click(object sender, EventArgs e)
        {
            this.Close();
            wr.Close();
        }
    }
}
