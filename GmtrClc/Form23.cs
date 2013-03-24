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
    public partial class Form23 : Form
    {
        StreamWriter wr = new StreamWriter("Параболоид.txt");

        public Form23()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double a, b, r1;
                string a1 = textBox1.Text;
                string b1 = textBox2.Text;

                a = Convert.ToDouble(a1);
                b = Convert.ToDouble(b1);

                r1 = 0.5 * Math.PI * Math.Pow(b, 2) * a;

                string s1 = Convert.ToString(r1);

                label6.Text = s1;

                label4.Visible = true;
                label5.Visible = true;
                label6.Visible = true;
                button2.Visible = true;

                wr.WriteLine("Высота а = "+a1);
                wr.WriteLine("Ширина b = "+b1);
                wr.WriteLine("Объём = "+s1);
                wr.WriteLine(); 


            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений параболоида сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label9_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
