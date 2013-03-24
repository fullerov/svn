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
    public partial class Form2 : Form
    {

        StreamWriter wr = new StreamWriter("Прямоугольник.txt");

        public Form2()
        {
            InitializeComponent();
        }

        private void Form2_Load(object sender, EventArgs e)
        {
            
        }

        

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double a, b, r1, r2;
                string a1 = this.textBox1.Text;
                string b1 = this.textBox2.Text;
                a = Convert.ToDouble(a1);
                b = Convert.ToDouble(b1);

                r1 = a * b;
                r2 = 2 * a + 2 * b;

                string sp = Convert.ToString(r1);
                rezpl.Text = sp;
                string sr = Convert.ToString(r2);
                rezpr.Text = sr;
               
                label4.Visible = true;
                label5.Visible = true;
                label6.Visible = true;
                rezpl.Visible = true;
                rezpr.Visible = true;
                button2.Visible = true;

                wr.WriteLine("Ширина прямоугольника = " + a1);
                wr.WriteLine("Длина прямоугольника = " + b1);
                wr.WriteLine("Площадь прямоугольника = " + sp);
                wr.WriteLine("Периметр прямоугольника = " + sr);
                wr.WriteLine();
            }
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643","Ошибка",MessageBoxButtons.OK,MessageBoxIcon.Error); } 



        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            
            wr.Close();
            MessageBox.Show("Результат вычислений прямоугольника сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information);
        }

        private void label9_Click(object sender, EventArgs e)
        {
            this.Close();

            wr.Close();
        }

      

      

        
    }
}
