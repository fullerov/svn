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
    public partial class Form8 : Form
    {
        StreamWriter wr = new StreamWriter("Сектор.txt");

        public Form8()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double r, o, r1, r2;
                string rs = textBox1.Text;
                string os = textBox2.Text; ;
                r = Convert.ToDouble(rs);
                o = Convert.ToDouble(os);

                r1 = 0.5 * Math.Pow(r,2) * o;
                r2 = r * o;

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

                wr.WriteLine("Радиус r = " + rs);
                wr.WriteLine("Угол O = " + os);
                wr.WriteLine("Площадь = " + s1);
                wr.WriteLine("Периметр = " + s2);
                wr.WriteLine();



            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }

        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений сектора сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label9_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }
    }
}
