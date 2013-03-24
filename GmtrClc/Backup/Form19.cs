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
    public partial class Form19 : Form
    {
        StreamWriter wr = new StreamWriter("Сферический сегмент.txt");

        public Form19()
        {
            InitializeComponent();
        }

        private void Form19_Load(object sender, EventArgs e)
        {
           
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double h, r, r1, r2;
                string hs = textBox1.Text;
                string rs = textBox2.Text;

                h = Convert.ToDouble(hs);
                r = Convert.ToDouble(rs);

                r1 = 0.3333 * Math.PI * Math.Pow(h, 2) * (3 * r - h);
                r2 = 2 * Math.PI * r * h;

                string s1 = Convert.ToString(r1);
                string s2 = Convert.ToString(r2);

                label7.Text = s1;
                label8.Text = s2;

                label4.Visible = true;
                label5.Visible = true;
                label6.Visible = true;
                label7.Visible = true;
                label8.Visible = true;
                button2.Visible = true;

                wr.WriteLine("Высота h = "+hs);
                wr.WriteLine("Радиус r = "+rs);
                wr.WriteLine("Объём = "+s1);
                wr.WriteLine("Площадь шаровой поверхности = "+s2);
                wr.WriteLine();



            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений сферического сегмента сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label9_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
