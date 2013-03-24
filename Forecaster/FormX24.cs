using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace M1
{
    public partial class FormX24 : Form
    {
        public FormX24()
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
                string sxx11 = textBox12.Text;
                string sxx12 = textBox14.Text;
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
                string syy11 = textBox13.Text;
                string syy12 = textBox15.Text;

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
                    wr.Write(" x11 = " + sxx11 + ";");
                    wr.Write(" x12 = " + sxx12 + ";");
                    wr.Write("\ny1 = " + syy1 + ";");
                    wr.Write(" y2 = " + syy2 + ";");
                    wr.Write(" y3 = " + syy3 + ";");
                    wr.Write(" y4 = " + syy4 + ";");
                    wr.Write(" y5 = " + syy5 + ";");
                    wr.Write(" y6 = " + syy6 + ";");
                    wr.Write(" y7 = " + syy7 + ";");
                    wr.Write(" y8 = " + syy8 + ";");
                    wr.Write(" y9 = " + syy9 + ";");
                    wr.Write(" y10 = " + syy10 + ";");
                    wr.Write(" y11 = " + syy11 + ";");
                    wr.Write(" y12 = " + syy12 + ";\n");
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
                double ix1, ix2, ix3, ix4, ix5, ix6, ix7, ix8, ix9, ix10, ix11, ix12,ix13,ix14,ix15,ix16,ix17,ix18,ix19,ix20,ix21,ix22,ix23,ix24, iy1, iy2, iy3, iy4, iy5, iy6, iy7, iy8, iy9, iy10, iy11, iy12, iy13,iy14,iy15,iy16,iy17,iy18,iy19,iy20,iy21,iy22,iy23,iy24,res, resh1, resh2, resh3, resh4, resh5, resh6, resh7, resh8, resh9, resh10, resh11, resh12,resh13,resh14,resh15,resh16,resh17,resh18,resh19,resh20,resh21,resh22,resh23,resh24;
                double x;
                string xx1, xx2, xx3, xx4, xx5, xx6, xx7, xx8, xx9, xx10, xx11, xx12,xx13,xx14,xx15,xx16,xx17,xx18,xx19,xx20,xx21,xx22,xx23,xx24, yy1, yy2, yy3, yy4, yy5, yy6, yy7, yy8, yy9, yy10, yy11, yy12,yy13,yy14,yy15,yy16,yy17,yy18,yy19,yy20,yy21,yy22,yy23,yy24, xresult, xiskomoe;

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
                xx11 = textBox12.Text;
                xx12 = textBox14.Text;
                xx13 = textBox16.Text;
                xx14 = textBox18.Text;
                xx15 = textBox20.Text;
                xx16 = textBox22.Text;
                xx17 = textBox24.Text;
                xx18 = textBox26.Text;
                xx19 = textBox29.Text;
                xx20 = textBox30.Text;
                xx21 = textBox32.Text;
                xx22 = textBox34.Text;
                xx23 = textBox36.Text;
                xx24 = textBox38.Text;
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
                yy11 = textBox13.Text;
                yy12 = textBox15.Text;
                yy13 = textBox17.Text;
                yy14 = textBox19.Text;
                yy15 = textBox21.Text;
                yy16 = textBox23.Text;
                yy17 = textBox25.Text;
                yy18 = textBox27.Text;
                yy19 = textBox28.Text;
                yy20 = textBox31.Text;
                yy21 = textBox33.Text;
                yy22 = textBox35.Text;
                yy23 = textBox37.Text;
                yy24 = textBox39.Text;
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
                ix11 = Convert.ToDouble(xx11);
                ix12 = Convert.ToDouble(xx12);
                ix13 = Convert.ToDouble(xx13);
                ix14 = Convert.ToDouble(xx14);
                ix15 = Convert.ToDouble(xx15);
                ix16 = Convert.ToDouble(xx16);
                ix17 = Convert.ToDouble(xx17);
                ix18 = Convert.ToDouble(xx18);
                ix19 = Convert.ToDouble(xx19);
                ix20 = Convert.ToDouble(xx20);
                ix21 = Convert.ToDouble(xx21);
                ix22 = Convert.ToDouble(xx22);
                ix23 = Convert.ToDouble(xx23);
                ix24 = Convert.ToDouble(xx24);
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
                iy11 = Convert.ToDouble(yy11);
                iy12 = Convert.ToDouble(yy12);
                iy13 = Convert.ToDouble(yy13);
                iy14 = Convert.ToDouble(yy14);
                iy15 = Convert.ToDouble(yy15);
                iy16 = Convert.ToDouble(yy16);
                iy17 = Convert.ToDouble(yy17);
                iy18 = Convert.ToDouble(yy18);
                iy19 = Convert.ToDouble(yy19);
                iy20 = Convert.ToDouble(yy20);
                iy21 = Convert.ToDouble(yy21);
                iy22 = Convert.ToDouble(yy22);
                iy23 = Convert.ToDouble(yy23);
                iy24 = Convert.ToDouble(yy24);
                x = Convert.ToDouble(xiskomoe);

                resh1 = (((x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix1 - ix2) * (ix1 - ix3) * (ix1 - ix4) * (ix1 - ix5) * (ix1 - ix6) * (ix1 - ix7) * (ix1 - ix8) * (ix1 - ix9) * (ix1 - ix10) * (ix1 - ix11) * (ix1 - ix12) * (ix1 - ix13) * (ix1 - ix14) * (ix1 - ix15) * (ix1 - ix16) * (ix1 - ix17) * (ix1 - ix18) * (ix1 - ix19) * (ix1 - ix20) * (ix1 - ix21) * (ix1 - ix22) * (ix1 - ix23) * (ix1 - ix24))) * iy1;
                resh2 = (((x - ix1) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix2 - ix1) * (ix2 - ix3) * (ix2 - ix4) * (ix2 - ix5) * (ix2 - ix6) * (ix2 - ix7) * (ix2 - ix8) * (ix2 - ix9) * (ix2 - ix10) * (ix2 - ix11) * (ix2 - ix12) * (ix2 - ix13) * (ix2 - ix14) * (ix2 - ix15) * (ix2 - ix16) * (ix2 - ix17) * (ix2 - ix18) * (ix2 - ix19) * (ix2 - ix20) * (ix2 - ix21) * (ix2 - ix22) * (ix2 - ix23) * (ix2 - ix24))) * iy2;
                resh3 = (((x - ix1) * (x - ix2) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix3 - ix1) * (ix3 - ix2) * (ix3 - ix4) * (ix3 - ix5) * (ix3 - ix6) * (ix3 - ix7) * (ix3 - ix8) * (ix3 - ix9) * (ix3 - ix10) * (ix3 - ix11) * (ix3 - ix12) * (ix3 - ix13) * (ix3 - ix14) * (ix3 - ix15) * (ix3 - ix16) * (ix3 - ix17) * (ix3 - ix18) * (ix3 - ix19) * (ix3 - ix20) * (ix3 - ix21) * (ix3 - ix22) * (ix3 - ix23) * (ix3 - ix24))) * iy3;
                resh4 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix4 - ix1) * (ix4 - ix2) * (ix4 - ix3) * (ix4 - ix5) * (ix4 - ix6) * (ix4 - ix7) * (ix4 - ix8) * (ix4 - ix9) * (ix4 - ix10) * (ix4 - ix11) * (ix4 - ix12) * (ix4 - ix13) * (ix4 - ix14) * (ix4 - ix15) * (ix4 - ix16) * (ix4 - ix17) * (ix4 - ix18) * (ix4 - ix19) * (ix4 - ix20) * (ix4 - ix21) * (ix4 - ix22) * (ix4 - ix23) * (ix4 - ix24))) * iy4;
                resh5 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix5 - ix1) * (ix5 - ix2) * (ix5 - ix3) * (ix5 - ix4) * (ix5 - ix6) * (ix5 - ix7) * (ix5 - ix8) * (ix5 - ix9) * (ix5 - ix10) * (ix5 - ix11) * (ix5 - ix12) * (ix5 - ix13) * (ix5 - ix14) * (ix5 - ix15) * (ix5 - ix16) * (ix5 - ix17) * (ix5 - ix18) * (ix5 - ix19) * (ix5 - ix20) * (ix5 - ix21) * (ix5 - ix22) * (ix5 - ix23) * (ix5 - ix24))) * iy5;
                resh6 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix6 - ix1) * (ix6 - ix2) * (ix6 - ix3) * (ix6 - ix4) * (ix6 - ix5) * (ix6 - ix7) * (ix6 - ix8) * (ix6 - ix9) * (ix6 - ix10) * (ix6 - ix11) * (ix6 - ix12) * (ix6 - ix13) * (ix6 - ix14) * (ix6 - ix15) * (ix6 - ix16) * (ix6 - ix17) * (ix6 - ix18) * (ix6 - ix19) * (ix6 - ix20) * (ix6 - ix21) * (ix6 - ix22) * (ix6 - ix23) * (ix6 - ix24))) * iy6;
                resh7 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix7 - ix1) * (ix7 - ix2) * (ix7 - ix3) * (ix7 - ix4) * (ix7 - ix5) * (ix7 - ix6) * (ix7 - ix8) * (ix7 - ix9) * (ix7 - ix10) * (ix7 - ix11) * (ix7 - ix12) * (ix7 - ix13) * (ix7 - ix14) * (ix7 - ix15) * (ix7 - ix16) * (ix7 - ix17) * (ix7 - ix18) * (ix7 - ix19) * (ix7 - ix20) * (ix7 - ix21) * (ix7 - ix22) * (ix7 - ix23) * (ix7 - ix24))) * iy7;
                resh8 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix8 - ix1) * (ix8 - ix2) * (ix8 - ix3) * (ix8 - ix4) * (ix8 - ix5) * (ix8 - ix6) * (ix8 - ix7) * (ix8 - ix9) * (ix8 - ix10) * (ix8 - ix11) * (ix8 - ix12) * (ix8 - ix13) * (ix8 - ix14) * (ix8 - ix15) * (ix8 - ix16) * (ix8 - ix17) * (ix8 - ix18) * (ix8 - ix19) * (ix8 - ix20) * (ix8 - ix21) * (ix8 - ix22) * (ix8 - ix23) * (ix8 - ix24))) * iy8;
                resh9 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix9 - ix1) * (ix9 - ix2) * (ix9 - ix3) * (ix9 - ix4) * (ix9 - ix5) * (ix9 - ix6) * (ix9 - ix7) * (ix9 - ix8) * (ix9 - ix10) * (ix9 - ix11) * (ix9 - ix12) * (ix9 - ix13) * (ix9 - ix14) * (ix9 - ix15) * (ix9 - ix16) * (ix9 - ix17) * (ix9 - ix18) * (ix9 - ix19) * (ix9 - ix20) * (ix9 - ix21) * (ix9 - ix22) * (ix9 - ix23) * (ix9 - ix24))) * iy9;
                resh10 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix10 - ix1) * (ix10 - ix2) * (ix10 - ix3) * (ix10 - ix4) * (ix10 - ix5) * (ix10 - ix6) * (ix10 - ix7) * (ix10 - ix8) * (ix10 - ix9) * (ix10 - ix11) * (ix10 - ix12) * (ix10 - ix13) * (ix10 - ix14) * (ix10 - ix15) * (ix10 - ix16) * (ix10 - ix17) * (ix10 - ix18) * (ix10 - ix19) * (ix10 - ix20) * (ix10 - ix21) * (ix10 - ix22) * (ix10 - ix23) * (ix10 - ix24))) * iy10;
                resh11 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix11 - ix1) * (ix11 - ix2) * (ix11 - ix3) * (ix11 - ix4) * (ix11 - ix5) * (ix11 - ix6) * (ix11 - ix7) * (ix11 - ix8) * (ix11 - ix9) * (ix11 - ix10) * (ix11 - ix12) * (ix11 - ix13) * (ix11 - ix14) * (ix11 - ix15) * (ix11 - ix16) * (ix11 - ix17) * (ix11 - ix18) * (ix11 - ix19) * (ix11 - ix20) * (ix11 - ix21) * (ix11 - ix22) * (ix11 - ix23) * (ix11 - ix24))) * iy11;
                resh12 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix12 - ix1) * (ix12 - ix2) * (ix12 - ix3) * (ix12 - ix4) * (ix12 - ix5) * (ix12 - ix6) * (ix12 - ix7) * (ix12 - ix8) * (ix12 - ix9) * (ix12 - ix10) * (ix12 - ix11) * (ix12 - ix13) * (ix12 - ix14) * (ix12 - ix15) * (ix12 - ix16) * (ix12 - ix17) * (ix12 - ix18) * (ix12 - ix19) * (ix12 - ix20) * (ix12 - ix21) * (ix12 - ix22) * (ix12 - ix23) * (ix12 - ix24))) * iy12;
                resh13 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix13 - ix1) * (ix13 - ix2) * (ix13 - ix3) * (ix13 - ix4) * (ix13 - ix5) * (ix13 - ix6) * (ix13 - ix7) * (ix13 - ix8) * (ix13 - ix9) * (ix13 - ix10) * (ix13 - ix11) * (ix13 - ix12) * (ix13 - ix14) * (ix13 - ix15) * (ix13 - ix16) * (ix13 - ix17) * (ix13 - ix18) * (ix13 - ix19) * (ix13 - ix20) * (ix13 - ix21) * (ix13 - ix22) * (ix13 - ix23) * (ix13 - ix24))) * iy13;
                resh14 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix14 - ix1) * (ix14 - ix2) * (ix14 - ix3) * (ix14 - ix4) * (ix14 - ix5) * (ix14 - ix6) * (ix14 - ix7) * (ix14 - ix8) * (ix14 - ix9) * (ix14 - ix10) * (ix14 - ix11) * (ix14 - ix12) * (ix14 - ix13) * (ix14 - ix15) * (ix14 - ix16) * (ix14 - ix17) * (ix14 - ix18) * (ix14 - ix19) * (ix14 - ix20) * (ix14 - ix21) * (ix14 - ix22) * (ix14 - ix23) * (ix14 - ix24))) * iy14;
                resh15 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix15 - ix1) * (ix15 - ix2) * (ix15 - ix3) * (ix15 - ix4) * (ix15 - ix5) * (ix15 - ix6) * (ix15 - ix7) * (ix15 - ix8) * (ix15 - ix9) * (ix15 - ix10) * (ix15 - ix11) * (ix15 - ix12) * (ix15 - ix13) * (ix15 - ix14) * (ix15 - ix16) * (ix15 - ix17) * (ix15 - ix18) * (ix15 - ix19) * (ix15 - ix20) * (ix15 - ix21) * (ix15 - ix22) * (ix15 - ix23) * (ix15 - ix24))) * iy15;
                resh16 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix16 - ix1) * (ix16 - ix2) * (ix16 - ix3) * (ix16 - ix4) * (ix16 - ix5) * (ix16 - ix6) * (ix16 - ix7) * (ix16 - ix8) * (ix16 - ix9) * (ix16 - ix10) * (ix16 - ix11) * (ix16 - ix12) * (ix16 - ix13) * (ix16 - ix14) * (ix16 - ix15) * (ix16 - ix17) * (ix16 - ix18) * (ix16 - ix19) * (ix16 - ix20) * (ix16 - ix21) * (ix16 - ix22) * (ix16 - ix23) * (ix16 - ix24))) * iy16;
                resh17 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix17 - ix1) * (ix17 - ix2) * (ix17 - ix3) * (ix17 - ix4) * (ix17 - ix5) * (ix17 - ix6) * (ix17 - ix7) * (ix17 - ix8) * (ix17 - ix9) * (ix17 - ix10) * (ix17 - ix11) * (ix17 - ix12) * (ix17 - ix13) * (ix17 - ix14) * (ix17 - ix15) * (ix17 - ix16) * (ix17 - ix18) * (ix17 - ix19) * (ix17 - ix20) * (ix17 - ix21) * (ix17 - ix22) * (ix17 - ix23) * (ix17 - ix24))) * iy17;
                resh18 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix18 - ix1) * (ix18 - ix2) * (ix18 - ix3) * (ix18 - ix4) * (ix18 - ix5) * (ix18 - ix6) * (ix18 - ix7) * (ix18 - ix8) * (ix18 - ix9) * (ix18 - ix10) * (ix18 - ix11) * (ix18 - ix12) * (ix18 - ix13) * (ix18 - ix14) * (ix18 - ix15) * (ix18 - ix16) * (ix18 - ix17) * (ix18 - ix19) * (ix18 - ix20) * (ix18 - ix21) * (ix18 - ix22) * (ix18 - ix23) * (ix18 - ix24))) * iy18;
                resh19 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix19 - ix1) * (ix19 - ix2) * (ix19 - ix3) * (ix19 - ix4) * (ix19 - ix5) * (ix19 - ix6) * (ix19 - ix7) * (ix19 - ix8) * (ix19 - ix9) * (ix19 - ix10) * (ix19 - ix11) * (ix19 - ix12) * (ix19 - ix13) * (ix19 - ix14) * (ix19 - ix15) * (ix19 - ix16) * (ix19 - ix17) * (ix19 - ix18) * (ix19 - ix20) * (ix19 - ix21) * (ix19 - ix22) * (ix19 - ix23) * (ix19 - ix24))) * iy19;
                resh20 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix21) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix20 - ix1) * (ix20 - ix2) * (ix20 - ix3) * (ix20 - ix4) * (ix20 - ix5) * (ix20 - ix6) * (ix20 - ix7) * (ix20 - ix8) * (ix20 - ix9) * (ix20 - ix10) * (ix20 - ix11) * (ix20 - ix12) * (ix20 - ix13) * (ix20 - ix14) * (ix20 - ix15) * (ix20 - ix16) * (ix20 - ix17) * (ix20 - ix18) * (ix20 - ix19) * (ix20 - ix21) * (ix20 - ix22) * (ix20 - ix23) * (ix20 - ix24))) * iy20;
                resh21 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix22) * (x - ix23) * (x - ix24)) / ((ix21 - ix1) * (ix21 - ix2) * (ix21 - ix3) * (ix21 - ix4) * (ix21 - ix5) * (ix21 - ix6) * (ix21 - ix7) * (ix21 - ix8) * (ix21 - ix9) * (ix21 - ix10) * (ix21 - ix11) * (ix21 - ix12) * (ix21 - ix13) * (ix21 - ix14) * (ix21 - ix15) * (ix21 - ix16) * (ix21 - ix17) * (ix21 - ix18) * (ix21 - ix19) * (ix21 - ix20) * (ix21 - ix22) * (ix21 - ix23) * (ix21 - ix24))) * iy21;
                resh22 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix23) * (x - ix24)) / ((ix22 - ix1) * (ix22 - ix2) * (ix22 - ix3) * (ix22 - ix4) * (ix22 - ix5) * (ix22 - ix6) * (ix22 - ix7) * (ix22 - ix8) * (ix22 - ix9) * (ix22 - ix10) * (ix22 - ix11) * (ix22 - ix12) * (ix22 - ix13) * (ix22 - ix14) * (ix22 - ix15) * (ix22 - ix16) * (ix22 - ix17) * (ix22 - ix18) * (ix22 - ix19) * (ix22 - ix20) * (ix22 - ix21) * (ix22 - ix23) * (ix22 - ix24))) * iy22;
                resh23 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix24)) / ((ix23 - ix1) * (ix23 - ix2) * (ix23 - ix3) * (ix23 - ix4) * (ix23 - ix5) * (ix23 - ix6) * (ix23 - ix7) * (ix23 - ix8) * (ix23 - ix9) * (ix23 - ix10) * (ix23 - ix11) * (ix23 - ix12) * (ix23 - ix13) * (ix23 - ix14) * (ix23 - ix15) * (ix23 - ix16) * (ix23 - ix17) * (ix23 - ix18) * (ix23 - ix19) * (ix23 - ix20) * (ix23 - ix21) * (ix23 - ix22) * (ix23 - ix24))) * iy23;
                resh24 = (((x - ix1) * (x - ix2) * (x - ix3) * (x - ix4) * (x - ix5) * (x - ix6) * (x - ix7) * (x - ix8) * (x - ix9) * (x - ix10) * (x - ix11) * (x - ix12) * (x - ix13) * (x - ix14) * (x - ix15) * (x - ix16) * (x - ix17) * (x - ix18) * (x - ix19) * (x - ix20) * (x - ix21) * (x - ix22) * (x - ix23)) / ((ix24 - ix1) * (ix24 - ix2) * (ix24 - ix3) * (ix24 - ix4) * (ix24 - ix5) * (ix24 - ix6) * (ix24 - ix7) * (ix24 - ix8) * (ix24 - ix9) * (ix24 - ix10) * (ix24 - ix11) * (ix24 - ix12) * (ix24 - ix13) * (ix24 - ix14) * (ix24 - ix15) * (ix24 - ix16) * (ix24 - ix17) * (ix24 - ix18) * (ix24 - ix19) * (ix24 - ix20) * (ix24 - ix21) * (ix24 - ix22) * (ix24 - ix23))) * iy24;












                res = resh1 + resh2 + resh3 + resh4 + resh5 + resh6 + resh7 + resh8 + resh9 + resh10 + resh11 + resh12 + resh13 + resh14 + resh15 + resh16 + resh17 + resh18 + resh19 + resh20 + resh21 + resh22 + resh23 + resh24;

                xresult = Convert.ToString(res);
                result.Text = xresult;


            }
            catch { MessageBox.Show("Вводите в поля только цифры, все поля должны быть заполнены!\nФормат ввода дробных значений: 3,14159265", "Предупреждение", MessageBoxButtons.OK, MessageBoxIcon.Warning); }
      
        }
    }
}
