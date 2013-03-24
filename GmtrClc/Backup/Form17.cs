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
    public partial class Form17 : Form
    {
        StreamWriter wr = new StreamWriter("Усечённый конус.txt");

        public Form17()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {

                double a, b, h, l, r1, r2;

                string a1 = textBox1.Text;
                string b1 = textBox2.Text;
                string h1 = textBox3.Text;
                string l1 = textBox4.Text;

                a = Convert.ToDouble(a1);
                b = Convert.ToDouble(b1);
                h = Convert.ToDouble(h1);
                l = Convert.ToDouble(l1);

                r1 = 0.3333 * Math.PI * h * (Math.Pow(a, 2) + a * b + Math.Pow(b, 2));
                r2 = Math.PI * (a + b) * l;

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);

                label9.Text = s1;
                label10.Text = s2;

                wr.WriteLine("Радиус а = "+a1);
                wr.WriteLine("Радиус b = " + b1);
                wr.WriteLine("Высота h = " + h1);
                wr.WriteLine("Сторона l = " + l1);
                wr.WriteLine("Объём = " + s1);
                wr.WriteLine("Площадь боковой поверхности = "+s2);
                wr.WriteLine();

                label6.Visible=true;
                label7.Visible = true;
                label8.Visible = true;
                label9.Visible = true;
                label10.Visible = true;
                button2.Visible = true;


            }

            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }


        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
           
            wr.Close();
            MessageBox.Show("Результат вычислений усечённого конуса сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label11_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
