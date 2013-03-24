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
    public partial class Form12 : Form
    {
        StreamWriter wr = new StreamWriter("Эллипс.txt");

        public Form12()
        {
            InitializeComponent();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            try
            {
                double a, b, r1, r2;
                string a1 = textBox1.Text;
                string b1 = textBox2.Text;

                a = Convert.ToDouble(a1);
                b = Convert.ToDouble(b1);

                r1 = Math.PI * a * b;
                r2 = (2 * Math.PI) + (Math.Sqrt(0.5 * (Math.Pow(a, 2) + Math.Pow(b, 2))));

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);

                label7.Text = s1;
                label8.Text = s2;

                label4.Visible = true;
                label5.Visible = true;
                label6.Visible = true;
                label7.Visible = true;
                label8.Visible = true;
                button1.Visible = true;

                wr.WriteLine("Ширина а = " + a1);
                wr.WriteLine("Высота b = " + b1);
                wr.WriteLine("Площадь = " + s1);
                wr.WriteLine("Периметр = " + s2);
                wr.WriteLine();


            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        
        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений эллипса сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label14_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }

    }
}
