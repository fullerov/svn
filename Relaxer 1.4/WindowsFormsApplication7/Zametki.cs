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
    public partial class Zametki : Form
    {
       
        
        public Zametki()
        {
            InitializeComponent();
        }

        private void выходToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            using (StreamWriter wrz1 = new StreamWriter("№ 1.txt"))
            {
                foreach (string  item1 in richTextBox1.Lines)
                {
                    wrz1.WriteLine(item1);
                }
                wrz1.Close();
            }

            using (StreamWriter wrz2 = new StreamWriter("№ 2.txt"))
            {
                foreach (string item2 in richTextBox2.Lines)
                {
                    wrz2.WriteLine(item2);
                }
                wrz2.Close();
            }

            using (StreamWriter wrz3 = new StreamWriter("№ 3.txt"))
            {

                foreach (string item3 in richTextBox3.Lines)
                {
                    wrz3.WriteLine(item3);
                }
                wrz3.Close();
            }

            using (StreamWriter wrz4 = new StreamWriter("№ 4.txt"))
            {
                foreach (string item4 in richTextBox4.Lines)
                {
                    wrz4.WriteLine(item4);
                }
                wrz4.Close();
            }

            using (StreamWriter wrz5 = new StreamWriter("№ 5.txt"))
            {
                foreach (string item5 in richTextBox5.Lines)
                {
                    wrz5.WriteLine(item5);
                }
                wrz5.Close();
            }

            using (StreamWriter wrz6 = new StreamWriter("№ 6.txt"))
            {
                foreach (string item6 in richTextBox6.Lines)
                {
                    wrz6.WriteLine(item6);
                }
                wrz6.Close();
            }

            using (StreamWriter wrz7 = new StreamWriter("№ 7.txt"))
            {
                foreach (string item7 in richTextBox7.Lines)
                {
                    wrz7.WriteLine(item7);
                }
                wrz7.Close();
            }

            using (StreamWriter wrz8 = new StreamWriter("№ 8.txt"))
            {
                foreach (string item8 in richTextBox8.Lines)
                {
                    wrz8.WriteLine(item8);
                }
                wrz8.Close();
            }

            using (StreamWriter wrz9 = new StreamWriter("№ 9.txt"))
            {
            foreach (string item9 in richTextBox9.Lines)
            {
                wrz9.WriteLine(item9);
            }
            wrz9.Close();
            }
            using (StreamWriter wrz10 = new StreamWriter("№ 10.txt"))
            {
                foreach (string item10 in richTextBox10.Lines)
                {
                    wrz10.WriteLine(item10);
                }
                wrz10.Close();
            }

            this.Close();
        }

        private void toolStripMenuItem1_Click(object sender, EventArgs e)
        {
            richTextBox1.Visible = true;
            richTextBox2.Visible = false;
            richTextBox3.Visible = false;
            richTextBox4.Visible = false;
            richTextBox5.Visible = false;
            richTextBox6.Visible = false;
            richTextBox7.Visible = false;
            richTextBox8.Visible = false;
            richTextBox9.Visible = false;
            richTextBox10.Visible = false;
            label1.Text = "1";
        }

        private void toolStripMenuItem2_Click(object sender, EventArgs e)
        {
            richTextBox1.Visible = false;
            richTextBox2.Visible = true;
            richTextBox3.Visible = false;
            richTextBox4.Visible = false;
            richTextBox5.Visible = false;
            richTextBox6.Visible = false;
            richTextBox7.Visible = false;
            richTextBox8.Visible = false;
            richTextBox9.Visible = false;
            richTextBox10.Visible = false;
            label1.Text = "2";
        }

        private void toolStripMenuItem3_Click(object sender, EventArgs e)
        {
            richTextBox1.Visible = false;
            richTextBox2.Visible = false;
            richTextBox3.Visible = true;
            richTextBox4.Visible = false;
            richTextBox5.Visible = false;
            richTextBox6.Visible = false;
            richTextBox7.Visible = false;
            richTextBox8.Visible = false;
            richTextBox9.Visible = false;
            richTextBox10.Visible = false;
            label1.Text = "3";
        }

        private void toolStripMenuItem4_Click(object sender, EventArgs e)
        {
            richTextBox1.Visible = false;
            richTextBox2.Visible = false;
            richTextBox3.Visible = false;
            richTextBox4.Visible = true;
            richTextBox5.Visible = false;
            richTextBox6.Visible = false;
            richTextBox7.Visible = false;
            richTextBox8.Visible = false;
            richTextBox9.Visible = false;
            richTextBox10.Visible = false;
            label1.Text = "4";
        }

        private void toolStripMenuItem5_Click(object sender, EventArgs e)
        {
            richTextBox1.Visible = false;
            richTextBox2.Visible = false;
            richTextBox3.Visible = false;
            richTextBox4.Visible = false;
            richTextBox5.Visible = true;
            richTextBox6.Visible = false;
            richTextBox7.Visible = false;
            richTextBox8.Visible = false;
            richTextBox9.Visible = false;
            richTextBox10.Visible = false;
            label1.Text = "5";
        }

        private void toolStripMenuItem6_Click(object sender, EventArgs e)
        {
            richTextBox1.Visible = false;
            richTextBox2.Visible = false;
            richTextBox3.Visible = false;
            richTextBox4.Visible = false;
            richTextBox5.Visible = false;
            richTextBox6.Visible = true;
            richTextBox7.Visible = false;
            richTextBox8.Visible = false;
            richTextBox9.Visible = false;
            richTextBox10.Visible = false;
            label1.Text = "6";
        }

        private void toolStripMenuItem7_Click(object sender, EventArgs e)
        {
            richTextBox1.Visible = false;
            richTextBox2.Visible = false;
            richTextBox3.Visible = false;
            richTextBox4.Visible = false;
            richTextBox5.Visible = false;
            richTextBox6.Visible = false;
            richTextBox7.Visible = true;
            richTextBox8.Visible = false;
            richTextBox9.Visible = false;
            richTextBox10.Visible = false;
            label1.Text = "7";
        }

        private void toolStripMenuItem8_Click(object sender, EventArgs e)
        {
            richTextBox1.Visible = false;
            richTextBox2.Visible = false;
            richTextBox3.Visible = false;
            richTextBox4.Visible = false;
            richTextBox5.Visible = false;
            richTextBox6.Visible = false;
            richTextBox7.Visible = false;
            richTextBox8.Visible = true;
            richTextBox9.Visible = false;
            richTextBox10.Visible = false;
            label1.Text = "8";
        }

        private void toolStripMenuItem9_Click(object sender, EventArgs e)
        {
            richTextBox1.Visible = false;
            richTextBox2.Visible = false;
            richTextBox3.Visible = false;
            richTextBox4.Visible = false;
            richTextBox5.Visible = false;
            richTextBox6.Visible = false;
            richTextBox7.Visible = false;
            richTextBox8.Visible = false;
            richTextBox9.Visible = true;
            richTextBox10.Visible = false;
            label1.Text = "9";
        }

        private void toolStripMenuItem10_Click(object sender, EventArgs e)
        {
            richTextBox1.Visible = false;
            richTextBox2.Visible = false;
            richTextBox3.Visible = false;
            richTextBox4.Visible = false;
            richTextBox5.Visible = false;
            richTextBox6.Visible = false;
            richTextBox7.Visible = false;
            richTextBox8.Visible = false;
            richTextBox9.Visible = false;
            richTextBox10.Visible = true;
            label1.Text = "10";
        }

        private void оЗаметкахToolStripMenuItem_Click(object sender, EventArgs e)
        {
            MessageBox.Show("Используйте заметки для хранения ваших мыслей, идей, задач и т.п. в текстовом формате!\nПосле нажатия кнопки выход все изменения автоматически сохраняются!\nДля работы с текстом пользуйтесь комбинациями клавиш:\n\nCtrl+A  выделить всё\nCtrl+C  копировать\nCtrl+V  вставить\nCtrl+X  вырезать\nCtrl+Z  отменить\nCtrl+Y  повторить\n ", "О  з а м е т к а х  . . .", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
        }

        private void сохранитьВсеToolStripMenuItem_Click(object sender, EventArgs e)
        {
            using (StreamWriter wrz1 = new StreamWriter("№ 1.txt"))
            {
                foreach (string  item1 in richTextBox1.Lines)
                {
                    wrz1.WriteLine(item1);
                }
            }

            using (StreamWriter wrz2 = new StreamWriter("№ 2.txt"))
            {
                foreach (string item2 in richTextBox2.Lines)
                {
                    wrz2.WriteLine(item2);
                }
            }

            using (StreamWriter wrz3 = new StreamWriter("№ 3.txt"))
            {
                foreach (string item3 in richTextBox3.Lines)
                {
                    wrz3.WriteLine(item3);
                }
            }

            using (StreamWriter wrz4 = new StreamWriter("№ 4.txt"))
            {
                foreach (string item4 in richTextBox4.Lines)
                {
                    wrz4.WriteLine(item4);
                }
            }

            using (StreamWriter wrz5 = new StreamWriter("№ 5.txt"))
            {
                foreach (string item5 in richTextBox5.Lines)
                {
                    wrz5.WriteLine(item5);
                }
            }

            using (StreamWriter wrz6 = new StreamWriter("№ 6.txt"))
            {
                foreach (string item6 in richTextBox6.Lines)
                {
                    wrz6.WriteLine(item6);
                }
            }

            using (StreamWriter wrz7 = new StreamWriter("№ 7.txt"))
            {
                foreach (string item7 in richTextBox7.Lines)
                {
                    wrz7.WriteLine(item7);
                }
            }

            using (StreamWriter wrz8 = new StreamWriter("№ 8.txt"))
            {
                foreach (string item8 in richTextBox8.Lines)
                {
                    wrz8.WriteLine(item8);
                }
            }

            using (StreamWriter wrz9 = new StreamWriter("№ 9.txt"))
            {
                foreach (string item9 in richTextBox9.Lines)
                {
                    wrz9.WriteLine(item9);
                }
            }

            using (StreamWriter wrz10 = new StreamWriter("№ 10.txt"))
            {
                foreach (string item10 in richTextBox10.Lines)
                {
                    wrz10.WriteLine(item10);
                }
            }
            


        }

        private void Zametki_Load(object sender, EventArgs e)
        {
            try
            {
                StreamReader rdz1 = new StreamReader("№ 1.txt");
                StreamReader rdz2 = new StreamReader("№ 2.txt");
                StreamReader rdz3 = new StreamReader("№ 3.txt");
                StreamReader rdz4 = new StreamReader("№ 4.txt");
                StreamReader rdz5 = new StreamReader("№ 5.txt");
                StreamReader rdz6 = new StreamReader("№ 6.txt");
                StreamReader rdz7 = new StreamReader("№ 7.txt");
                StreamReader rdz8 = new StreamReader("№ 8.txt");
                StreamReader rdz9 = new StreamReader("№ 9.txt");
                StreamReader rdz10 = new StreamReader("№ 10.txt");

                string buf1, buf2, buf3, buf4, buf5, buf6, buf7, buf8, buf9, buf10;

                while ((buf1 = rdz1.ReadLine()) != null)
                {
                    richTextBox1.Text += buf1 + "\n";
                }

                while ((buf2 = rdz2.ReadLine()) != null)
                {
                    richTextBox2.Text += buf2 + "\n";
                }

                while ((buf3 = rdz3.ReadLine()) != null)
                {
                    richTextBox3.Text += buf3 + "\n";
                }

                while ((buf4 = rdz4.ReadLine()) != null)
                {
                    richTextBox4.Text += buf4 + "\n";
                }

                while ((buf5 = rdz5.ReadLine()) != null)
                {
                    richTextBox5.Text += buf5 + "\n";
                }

                while ((buf6 = rdz6.ReadLine()) != null)
                {
                    richTextBox6.Text += buf6 + "\n";
                }

                while ((buf7 = rdz7.ReadLine()) != null)
                {
                    richTextBox7.Text += buf7 + "\n";
                }

                while ((buf8 = rdz8.ReadLine()) != null)
                {
                    richTextBox8.Text += buf8 + "\n";
                }

                while ((buf9 = rdz9.ReadLine()) != null)
                {
                    richTextBox9.Text += buf9 + "\n";
                }

                while ((buf10 = rdz10.ReadLine()) != null)
                {
                    richTextBox10.Text += buf10 + "\n";
                }
                rdz1.Close();
                rdz2.Close();
                rdz3.Close();
                rdz4.Close();
                rdz5.Close();
                rdz6.Close();
                rdz7.Close();
                rdz8.Close();
                rdz9.Close();
                rdz10.Close();
            }
            catch { }
            
        }

        private void очиститьВсеToolStripMenuItem_Click(object sender, EventArgs e)
        {
            richTextBox1.Clear();
            richTextBox2.Clear();
            richTextBox3.Clear();
            richTextBox4.Clear();
            richTextBox5.Clear();
            richTextBox6.Clear();
            richTextBox7.Clear();
            richTextBox8.Clear();
            richTextBox9.Clear();
            richTextBox10.Clear();
        }

       

        private void toolStripMenuItem13_Click(object sender, EventArgs e)
        {
            Opacity = 0.95;
        }

        private void toolStripMenuItem14_Click(object sender, EventArgs e)
        {
            Opacity = 0.9;
        }

        private void toolStripMenuItem15_Click(object sender, EventArgs e)
        {
            Opacity = 0.8;
        }

        private void toolStripMenuItem16_Click(object sender, EventArgs e)
        {
            Opacity = 0.75;
        }

        private void toolStripMenuItem17_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
        }

        private void toolStripMenuItem18_Click(object sender, EventArgs e)
        {
            Opacity = 0.65;
        }

        private void toolStripMenuItem19_Click(object sender, EventArgs e)
        {
            Opacity = 0.6;
        }

        private void нетToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Opacity = 1;
        }

        private void label3_Click(object sender, EventArgs e)
        {

            using (StreamWriter wrz1 = new StreamWriter("№ 1.txt"))
            {
                foreach (string item1 in richTextBox1.Lines)
                {
                    wrz1.WriteLine(item1);
                }
                wrz1.Close();
            }

            using (StreamWriter wrz2 = new StreamWriter("№ 2.txt"))
            {
                foreach (string item2 in richTextBox2.Lines)
                {
                    wrz2.WriteLine(item2);
                }
                wrz2.Close();
            }

            using (StreamWriter wrz3 = new StreamWriter("№ 3.txt"))
            {

                foreach (string item3 in richTextBox3.Lines)
                {
                    wrz3.WriteLine(item3);
                }
                wrz3.Close();
            }

            using (StreamWriter wrz4 = new StreamWriter("№ 4.txt"))
            {
                foreach (string item4 in richTextBox4.Lines)
                {
                    wrz4.WriteLine(item4);
                }
                wrz4.Close();
            }

            using (StreamWriter wrz5 = new StreamWriter("№ 5.txt"))
            {
                foreach (string item5 in richTextBox5.Lines)
                {
                    wrz5.WriteLine(item5);
                }
                wrz5.Close();
            }

            using (StreamWriter wrz6 = new StreamWriter("№ 6.txt"))
            {
                foreach (string item6 in richTextBox6.Lines)
                {
                    wrz6.WriteLine(item6);
                }
                wrz6.Close();
            }

            using (StreamWriter wrz7 = new StreamWriter("№ 7.txt"))
            {
                foreach (string item7 in richTextBox7.Lines)
                {
                    wrz7.WriteLine(item7);
                }
                wrz7.Close();
            }

            using (StreamWriter wrz8 = new StreamWriter("№ 8.txt"))
            {
                foreach (string item8 in richTextBox8.Lines)
                {
                    wrz8.WriteLine(item8);
                }
                wrz8.Close();
            }

            using (StreamWriter wrz9 = new StreamWriter("№ 9.txt"))
            {
                foreach (string item9 in richTextBox9.Lines)
                {
                    wrz9.WriteLine(item9);
                }
                wrz9.Close();
            }
            using (StreamWriter wrz10 = new StreamWriter("№ 10.txt"))
            {
                foreach (string item10 in richTextBox10.Lines)
                {
                    wrz10.WriteLine(item10);
                }
                wrz10.Close();
            }

            this.Close();
        }

        private void label4_Click(object sender, EventArgs e)
        {
            WindowState = FormWindowState.Maximized;
            label4.Visible = false;
            label5.Visible = true;
            
        }

        private void label5_Click(object sender, EventArgs e)
        {
            WindowState = FormWindowState.Normal;
            label4.Visible = true; ;
            label5.Visible = false;
        }

        

       

        private void шрифтToolStripMenuItem_Click(object sender, EventArgs e)
        {
            fontDialog1.ShowColor = true;

            fontDialog1.Font = richTextBox10.Font;
            fontDialog1.Color = richTextBox10.ForeColor;
            fontDialog1.Font = richTextBox9.Font;
            fontDialog1.Color = richTextBox9.ForeColor;
            fontDialog1.Font = richTextBox8.Font;
            fontDialog1.Color = richTextBox8.ForeColor;
            fontDialog1.Font = richTextBox7.Font;
            fontDialog1.Color = richTextBox7.ForeColor;
            fontDialog1.Font = richTextBox6.Font;
            fontDialog1.Color = richTextBox6.ForeColor;
            fontDialog1.Font = richTextBox5.Font;
            fontDialog1.Color = richTextBox5.ForeColor;
            fontDialog1.Font = richTextBox4.Font;
            fontDialog1.Color = richTextBox4.ForeColor;
            fontDialog1.Font = richTextBox3.Font;
            fontDialog1.Color = richTextBox3.ForeColor;
            fontDialog1.Font = richTextBox2.Font;
            fontDialog1.Color = richTextBox2.ForeColor;
            fontDialog1.Font = richTextBox1.Font;
            fontDialog1.Color = richTextBox1.ForeColor;

            if (fontDialog1.ShowDialog() != DialogResult.Cancel)
            {
                richTextBox10.Font = fontDialog1.Font;
                richTextBox10.ForeColor = fontDialog1.Color;
                richTextBox9.Font = fontDialog1.Font;
                richTextBox9.ForeColor = fontDialog1.Color;
                richTextBox8.Font = fontDialog1.Font;
                richTextBox8.ForeColor = fontDialog1.Color;
                richTextBox7.Font = fontDialog1.Font;
                richTextBox7.ForeColor = fontDialog1.Color;
                richTextBox6.Font = fontDialog1.Font;
                richTextBox6.ForeColor = fontDialog1.Color;
                richTextBox5.Font = fontDialog1.Font;
                richTextBox5.ForeColor = fontDialog1.Color;
                richTextBox4.Font = fontDialog1.Font;
                richTextBox4.ForeColor = fontDialog1.Color;
                richTextBox3.Font = fontDialog1.Font;
                richTextBox3.ForeColor = fontDialog1.Color;
                richTextBox2.Font = fontDialog1.Font;
                richTextBox2.ForeColor = fontDialog1.Color;
                richTextBox1.Font = fontDialog1.Font;
                richTextBox1.ForeColor = fontDialog1.Color;
            }
        }

        

       

        

        

        

        

        

        

        

        

       

        

        

        

        

       

        
    }
}
