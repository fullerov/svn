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
    public partial class Form21 : Form
    {
        StreamWriter wr = new StreamWriter("Тор.txt");

        public Form21()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double a, b, r1, r2;
                string a1 = textBox1.Text;
                string b1 = textBox2.Text;

                a = Convert.ToDouble(a1);
                b = Convert.ToDouble(b1);
                double rr = b - a;

                r1 = 0.25 * Math.Pow(Math.PI, 2) * (a + b) * Math.Pow(rr, 2);
                r2 = Math.Pow(Math.PI, 2) * (Math.Pow(b, 2) - Math.Pow(a, 2));

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);

                if (a >= b)
                {
                    label4.Visible = true;
                    button2.Visible = true;
                    label4.Text = "a < b !!!!";
                    label5.Visible = false;
                    label6.Visible = false;
                    label7.Visible = false;
                    label8.Visible = false;
                   
                    wr.WriteLine("? a < b !!!");
                    wr.WriteLine();
                }
                else
                {

                    label7.Text = s1;
                    label8.Text = s2;
                    label4.Text = "Результат :";
                    label4.Visible = true;
                    label5.Visible = true;
                    label6.Visible = true;
                    label7.Visible = true;
                    label8.Visible = true;
                    button2.Visible = true;

                    wr.WriteLine("Радиус a = " + a1);
                    wr.WriteLine("Прямая b = " + b1);
                    wr.WriteLine("Объём = " + s1);
                    wr.WriteLine("Площадь поверхности = " + s2);
                    wr.WriteLine();
                }


            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }


        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений тора сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label9_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
