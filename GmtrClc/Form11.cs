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
    public partial class Form11 : Form
    {
        StreamWriter wr = new StreamWriter("Параболический сегмент.txt");

        public Form11()
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

                r1 = 0.6666667 * a * b;
                r2 = (0.5 * (Math.Sqrt(Math.Pow(b, 2) + 16 * Math.Pow(a, 2)))) + ((Math.Pow(b, 2) / (8 * a)) * Math.Log((4 * a + Math.Sqrt(Math.Pow(b, 2) + 16 * Math.Pow(a, 2))) / b));

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

                wr.WriteLine("Высота а = " + a1);
                wr.WriteLine("Основание b = " + b1);
                wr.WriteLine("Площадь = " + s1);
                wr.WriteLine("Длина дуги = " + s2);
                wr.WriteLine();


            
            
            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
         
            wr.Close();
            MessageBox.Show("Результат вычислений параболического сегмента сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label14_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }

       
    }
}
