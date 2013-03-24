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
    public partial class Form9 : Form
    {
        StreamWriter wr = new StreamWriter("Сегмент.txt");

        public Form9()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double r, o, r1;
                string rs = textBox1.Text;
                string o1 = textBox2.Text;
                r = Convert.ToDouble(rs);
                o = Convert.ToDouble(o1);

                r1 = 0.5 * Math.Pow(r, 2) * (o - Math.Sin(o));

                string s1 = Convert.ToString(r1);
                label6.Text = s1;

                label4.Visible = true;
                label5.Visible = true;
                label6.Visible = true;
                button2.Visible = true;

                wr.WriteLine("Радиус r = " + rs);
                wr.WriteLine("Угол О = " + o1);
                wr.WriteLine("Площадь = " + s1);
                wr.WriteLine();



            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений сегмента сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label7_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
