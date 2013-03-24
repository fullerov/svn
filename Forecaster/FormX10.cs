using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace M1
{
    public partial class FormX10 : Form
    {
        public FormX10()
        {
            InitializeComponent();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            About ab = new About();
            ab.Show();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            try
            {
                string sxx1 = x1.Text;
                string sxx2 = x2.Text;
                string sxx3 = x3.Text;
                string sxx4 = x4.Text;
                string sxx5 = x5.Text;
                string sxx6 = textBox2.Text;
                string sxx7 = textBox5.Text;
                string sxx8 = textBox6.Text;
                string sxx9 = textBox8.Text;
                string sxx10 = textBox10.Text;
                string syy1 = y1.Text;
                string syy2 = y2.Text;
                string syy3 = y3.Text;
                string syy4 = y4.Text;
                string syy5 = y5.Text;
                string syy6 = textBox3.Text;
                string syy7 = textBox4.Text;
                string syy8 = textBox7.Text;
                string syy9 = textBox9.Text;
                string syy10 = textBox11.Text;

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
                    wr.Write(" x4 = " + sxx4 + ";");
                    wr.Write(" x5 = " + sxx5 + ";");
                    wr.Write(" x6 = " + sxx6 + ";");
                    wr.Write(" x7 = " + sxx7 + ";");
                    wr.Write(" x8 = " + sxx8 + ";");
                    wr.Write(" x9 = " + sxx9 + ";");
                    wr.Write(" x10 = " + sxx10 + ";");
                    wr.Write("\ny1 = " + syy1 + ";");
                    wr.Write(" y2 = " + syy2 + ";");
                    wr.Write(" y3 = " + syy3 + ";");
                    wr.Write(" y4 = " + syy4 + ";");
                    wr.Write(" y5 = " + syy5 + ";");
                    wr.Write(" y6 = " + syy6 + ";");
                    wr.Write(" y7 = " + syy7 + ";");
                    wr.Write(" y8 = " + syy8 + ";");
                    wr.Write(" y9 = " + syy9 + ";");
                    wr.Write(" y10 = " + syy10 + ";\n");
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
                double ix1, ix2, ix3, ix4, ix5, ix6, ix7, ix8, ix9, ix10,iy1, iy2, iy3, iy4, iy5, iy6, iy7, iy8, iy9, iy10,res, resh1, resh2, resh3, resh4, resh5, resh6, resh7, resh8, resh9,resh10;
                double x;
                string xx1, xx2, xx3, xx4, xx5, xx6, xx7, xx8, xx9, xx10, yy1, yy2, yy3, yy4, yy5, yy6, yy7, yy8, yy9,yy10, xresult, xiskomoe;

                xx1 = x1.Text;
                xx2 = x2.Text;
                xx3 = x3.Text;
                xx4 = x4.Text;
                xx5 = x5.Text;
                xx6 = textBox2.Text;
                xx7 = textBox5.Text;
                xx8 = textBox6.Text;
                xx9 = textBox8.Text;
                xx10 = textBox10.Text;
                yy1 = y1.Text;
                yy2 = y2.Text;
                yy3 = y3.Text;
                yy4 = y4.Text;
                yy5 = y5.Text;
                yy6 = textBox3.Text;
                yy7 = textBox4.Text;
                yy8 = textBox7.Text;
                yy9 = textBox9.Text;
                yy10 = textBox11.Text;
                xiskomoe = iskomoe.Text;



                ix1 = Convert.ToDouble(xx1);
                ix2 = Convert.ToDouble(xx2);
                ix3 = Convert.ToDouble(xx3);
                ix4 = Convert.ToDouble(xx4);
                ix5 = Convert.ToDouble(xx5);
                ix6 = Convert.ToDouble(xx6);
                ix7 = Convert.ToDouble(xx7);
                ix8 = Convert.ToDouble(xx8);
                ix9 = Convert.ToDouble(xx9);
                ix10 = Convert.ToDouble(xx10);
                iy1 = Convert.ToDouble(yy1);
                iy2 = Convert.ToDouble(yy2);
                iy3 = Convert.ToDouble(yy3);
                iy4 = Convert.ToDouble(yy4);
                iy5 = Convert.ToDouble(yy5);
                iy6 = Convert.ToDouble(yy6);
                iy7 = Convert.ToDouble(yy7);
                iy8 = Convert.ToDouble(yy8);
                iy9 = Convert.ToDouble(yy9);
                iy10 = Convert.ToDouble(yy10);
                x = Convert.ToDouble(xiskomoe);

                resh1 = (((x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10)) / ((ix1 - ix2) * (ix1 - ix3) * (ix1 - ix4) * (ix1 - ix5) * (ix1 - ix6) * (ix1 - ix7) * (ix1 - ix8) * (ix1 - ix9) * (ix1 - ix10))) * iy1;
                resh2 = (((x - ix1) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10)) / ((ix2 - ix1) * (ix2 - ix3) * (ix2 - ix4) * (ix2 - ix5) * (ix2 - ix6) * (ix2 - ix7) * (ix2 - ix8) * (ix2 - ix9) * (ix2 - ix10))) * iy2;
                resh3 = (((x - ix1) * (x - ix2) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10)) / ((ix3 - ix1) * (ix3 - ix2) * (ix3 - ix4) * (ix3 - ix5) * (ix3 - ix6) * (ix3 - ix7) * (ix3 - ix8) * (ix3 - ix9) * (ix3 - ix10))) * iy3;
                resh4 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10)) / ((ix4 - ix1) * (ix4 - ix2) * (ix4 - ix3) * (ix4 - ix5) * (ix4 - ix6) * (ix4 - ix7) * (ix4 - ix8) * (ix4 - ix9) * (ix4 - ix10))) * iy4;
                resh5 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10)) / ((ix5 - ix1) * (ix5 - ix2) * (ix5 - ix3) * (ix5 - ix4) * (ix5 - ix6) * (ix5 - ix7) * (ix5 - ix8) * (ix5 - ix9) * (ix5 - ix10))) * iy5;
                resh6 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10)) / ((ix6 - ix1) * (ix6 - ix2) * (ix6 - ix3) * (ix6 - ix4) * (ix6 - ix5) * (ix6 - ix7) * (ix6 - ix8) * (ix6 - ix9) * (ix6 - ix10))) * iy6;
                resh7 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix8) * (x - ix9) * (x - ix10)) / ((ix7 - ix1) * (ix7 - ix2) * (ix7 - ix3) * (ix7 - ix4) * (ix7 - ix5) * (ix7 - ix6) * (ix7 - ix8) * (ix7 - ix9) * (ix7 - ix10))) * iy7;
                resh8 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix9) * (x - ix10)) / ((ix8 - ix1) * (ix8 - ix2) * (ix8 - ix3) * (ix8 - ix4) * (ix8 - ix5) * (ix8 - ix6) * (ix8 - ix7) * (ix8 - ix9) * (ix8 - ix10))) * iy8;
                resh9 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix10)) / ((ix9 - ix1) * (ix9 - ix2) * (ix9 - ix3) * (ix9 - ix4) * (ix9 - ix5) * (ix9 - ix6) * (ix9 - ix7) * (ix9 - ix8) * (ix9 - ix10))) * iy9;
                resh10 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9)) / ((ix10 - ix1) * (ix10 - ix2) * (ix10 - ix3) * (ix10 - ix4) * (ix10 - ix5) * (ix10 - ix6) * (ix10 - ix7) * (ix10 - ix8) * (ix10 - ix9))) * iy10;

                res = resh1 + resh2 + resh3 + resh4 + resh5 + resh6 + resh7 + resh8 + resh9 + resh10;

                xresult = Convert.ToString(res);
                result.Text = xresult;


            }
            catch { MessageBox.Show("Вводите в поля только цифры, все поля должны быть заполнены!\nФормат ввода дробных значений: 3,14159265", "Предупреждение", MessageBoxButtons.OK, MessageBoxIcon.Warning); }
        }
    }
}
