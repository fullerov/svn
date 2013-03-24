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
    public partial class Form6 : Form
    {
        StreamWriter wr = new StreamWriter("Трапеция.txt");

        public Form6()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double a, b, h, f, o, r1, r2;
               
                string a1 = textBox1.Text;
                string b1 = textBox2.Text;
                string h1 = textBox3.Text;
                string f1 = textBox4.Text;
                string o1 = textBox5.Text;

                a = Convert.ToDouble(a1);
                b = Convert.ToDouble(b1);
                h = Convert.ToDouble(h1);
                f = Convert.ToDouble(f1);
                o = Convert.ToDouble(o1);

                r1 = 0.5 * h * (a + b);
                r2 = (a + b) + h *(1 / Math.Sin(o) + 1 / Math.Sin(f));

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);

                label10.Text = s1;
                label11.Text = s2;

                wr.WriteLine("Длина а = " + a1);
                wr.WriteLine("Основание b = " + b1);
                wr.WriteLine("Высота h = " + h1);
                wr.WriteLine("Угол O = " + o1);
                wr.WriteLine("Угол Ф = " + f1);
                wr.WriteLine("Площадь = " + s1);
                wr.WriteLine("Периметр = " + s2);
                wr.WriteLine();

                label7.Visible = true;
                label8.Visible = true;
                label9.Visible = true;
                label10.Visible = true;
                label11.Visible = true;
                button2.Visible = true;





            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений трапеции сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label12_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
