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
    public partial class Form15 : Form
    {
        StreamWriter wr = new StreamWriter("Пирамида.txt");

        public Form15()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double a, h, r1;
                string a1 = textBox1.Text;
                string h1 = textBox2.Text;

                a = Convert.ToDouble(a1);
                h = Convert.ToDouble(h1);

                r1 = 0.33333 * a * h;
                string s1 = Convert.ToString(r1);

                label6.Text = s1;

                label4.Visible = true;
                label5.Visible = true;
                label6.Visible = true;
                button2.Visible = true;

                wr.WriteLine("Сторона А = " + a1);
                wr.WriteLine("Высота h = " + h1);
                wr.WriteLine("Объём = " + s1);
                wr.WriteLine();
            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений пирамиды сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label11_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
