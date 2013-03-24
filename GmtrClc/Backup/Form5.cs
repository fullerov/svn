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
    public partial class Form5 : Form
    {
        StreamWriter wr = new StreamWriter("Параллелограм.txt");

        public Form5()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double a, b, h, r1, r2;
                string a1 = textBox1.Text;
                string b1 = textBox2.Text;
                string h1 = textBox3.Text;

                a = Convert.ToDouble(a1);
                b = Convert.ToDouble(b1);
                h = Convert.ToDouble(h1);

                r1 = b * h;
                r2 = 2 * a + 2 * b;

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);

                label8.Text = s1;
                label9.Text = s2;

                wr.WriteLine("Ширина а = " + a1);
                wr.WriteLine("Длина b = " + b1);
                wr.WriteLine("Высота h = " + h1);
                wr.WriteLine("Площадь = " + s1);
                wr.WriteLine("Периметр = " + s2);
                wr.WriteLine();

                label5.Visible = true;
                label6.Visible = true;
                label7.Visible = true;
                label8.Visible = true;
                label9.Visible = true;
                button2.Visible = true;




            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            wr.Close();
            
            MessageBox.Show("Результат вычислений параллелограма сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);

        }

        private void label12_Click(object sender, EventArgs e)
        {
            this.Close();
            wr.Close();
        }
    }
}
