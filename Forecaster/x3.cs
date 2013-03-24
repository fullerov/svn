﻿using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace M1
{
    public partial class x3 : Form
    {
        public x3()
        {
            InitializeComponent();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            About ab = new About();
            ab.Show();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            try
            {
                string sxx1 = x1.Text;
                string sxx2 = x2.Text;
                string sxx3 = xr3.Text;
                string syy1 = y1.Text;
                string syy2 = y2.Text;
                string syy3 = y3.Text;
             
                string sxiskomoe = iskomoe.Text;
                string sres = result.Text;
                string komment = textBox1.Text;
                saveFileDialog1.Filter = "Текстовой файл (*.txt)|*.txt";
                saveFileDialog1.FileName = "";
                if (saveFileDialog1.ShowDialog() == DialogResult.OK && saveFileDialog1.FileName.Length > 0)
                {
                    System.IO.FileStream fs = new System.IO.FileStream(saveFileDialog1.FileName, System.IO.FileMode.Create);
                    System.IO.StreamWriter wr = new System.IO.StreamWriter(fs, Encoding.GetEncoding("Windows-1251"));
                    wr.Write(komment + ":\n");
                    wr.Write("x1 = " + sxx1 + ";");
                    wr.Write(" x2 = " + sxx2 + ";");
                    wr.Write(" x3 = " + sxx3 + ";");
           
                    wr.Write("\ny1 = " + syy1 + ";");
                    wr.Write(" y2 = " + syy2 + ";");
                    wr.Write(" y3 = " + syy3 + ";\n");
  
                    wr.Write("при x = " + sxiskomoe);
                    wr.Write("  y = " + sres + ";");
                    wr.Close();
                    fs.Close();

                }
            }
            catch { MessageBox.Show("Ошибка ввода!"); }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                double ix1, ix2, ix3, iy1, iy2, iy3, res, resh1, resh2, resh3;
                double x;
                string xx1, xx2, xx3, yy1, yy2, yy3, xresult, xiskomoe;

                xx1 = x1.Text;
                xx2 = x2.Text;
                xx3 = xr3.Text;

                yy1 = y1.Text;
                yy2 = y2.Text;
                yy3 = y3.Text;

                xiskomoe = iskomoe.Text;



                ix1 = Convert.ToDouble(xx1);
                ix2 = Convert.ToDouble(xx2);
                ix3 = Convert.ToDouble(xx3);

                iy1 = Convert.ToDouble(yy1);
                iy2 = Convert.ToDouble(yy2);
                iy3 = Convert.ToDouble(yy3);

                x = Convert.ToDouble(xiskomoe);

                resh1 = (((x - ix2) * (x - ix3)) / ((ix1 - ix2) * (ix1 - ix3))) * iy1;
                resh2 = (((x - ix1) * (x - ix3)) / ((ix2 - ix1) * (ix2 - ix3))) * iy2;
                resh3 = (((x - ix1) * (x - ix2)) / ((ix3 - ix1) * (ix3 - ix2))) * iy3;
               

                res = resh1 + resh2 + resh3;

                xresult = Convert.ToString(res);
                result.Text = xresult;


            }
            catch { MessageBox.Show("Вводите в поля только цифры, все поля должны быть заполнены!\nФормат ввода дробных значений: 3,14159265", "Предупреждение", MessageBoxButtons.OK, MessageBoxIcon.Warning); }
     
        }
    }
}
