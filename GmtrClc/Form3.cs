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
    public partial class Form3 : Form
    {
        StreamWriter wr = new StreamWriter("Цилиндр.txt");
        
        public Form3()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double r, h, r1, r2; // перем. в которых\с которыми производятся выч-я
                string rs = textBox1.Text; //придание переменной значения текст. поля 
                string hs = textBox2.Text;
                r = Convert.ToDouble(rs); // конверт. полей строк в дробные знач.
                h = Convert.ToDouble(hs);

                r1 = Math.PI * Math.Pow(r,2) * h; //вычисления
                r2 = 2 * Math.PI * r * h;

                string s1 = Convert.ToString(r1); //конв. знач. вычислений в строки
                string s2 = Convert.ToString(r2);

                label7.Text = s1; // придание этикеткам значений строк
                label8.Text = s2;

                wr.WriteLine("Радиус цилиндра = " + rs); //запись в текст. файл
                wr.WriteLine("Высота цилиндра = " + hs);
                wr.WriteLine("Объём цилиндра = " + s1);
                wr.WriteLine("Площадь боковой поверхности = " + s2);
                wr.WriteLine();

                label5.Visible = true; //придание видимости скрытым объектам
                label6.Visible = true;
                label7.Visible = true;
                label8.Visible = true;
                button2.Visible = true;


            
            } // ниже перехват исключения
            catch { MessageBox.Show("Текстовые поля должны содержать только числа, и не быть пустыми !!!\nФормат ввода дробных значений: 3,141592653589793238462643", "Ошибка", MessageBoxButtons.OK, MessageBoxIcon.Error); }
        }

        private void button2_Click(object sender, EventArgs e)
        { 
            this.Close(); //закрытие этой формы
            
            wr.Close();// завершение записи в файл
            MessageBox.Show("Результат вычислений цилиндра сохранён в папке с программой!", "Создан текстовой файл...", MessageBoxButtons.OK, MessageBoxIcon.Information); // вывод сообщение для пользователя
        }

        private void label9_Click(object sender, EventArgs e)
        {
            this.Close(); //закрытие этой формы

            wr.Close();
        }
    }
}
