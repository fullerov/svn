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
    public partial class Form22 : Form
    {
        StreamWriter wr = new StreamWriter("Эллипсоид.txt");

        public Form22()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double a, b, c, r1;
                string a1 = textBox1.Text;
                string b1 = textBox2.Text;
                string c1 = textBox3.Text;

                a = Convert.ToDouble(a1);
                b = Convert.ToDouble(b1);
                c = Convert.ToDouble(c1);

                r1 = 1.33333 * Math.PI * a * b * c;

                string s1 = Convert.ToString(r1);

                label7.Text = s1;

                label5.Visible = true;
                label6.Visible = true;
                label7.Visible = true;
                button2.Visible = true;

                wr.WriteLine("Глубина а = "+a1);
                wr.WriteLine("Ширина b = "+b1);
                wr.WriteLine("Высота с = "+c1);
                wr.WriteLine("Объём = "+s1);
                wr.WriteLine();

            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }

        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений эллипсоида сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label9_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
