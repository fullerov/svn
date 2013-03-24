using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;

using System.Windows.Forms;

namespace WindowsFormsApplication7
{
    public partial class Form2 : Form
    {
      public int a = 0;
      public int b = 0;
      public int c = 0;
      public int d;
      public int hr = 0,srri;
      public string s1,srrr;

      public int so;
      int rab;
      int otd=20;
        public Form2()
        {
            InitializeComponent();
        
        

        }

        private void Form2_Load(object sender, EventArgs e)
        {
            this.Show();
            
            
        }


        private void timer1_Tick(object sender, EventArgs e)
        {
            if (a == b)
            {
              timer1.Stop(); a = 0; 
              timer2.Start();
              this.Show();
              hr += 1;
                
              if (hr >= 6 && b>80) { Form5 f5 = new Form5(); f5.Show(); }

             
            }
            else
            {
               a = a + 1;
               int t01 = a;
               int t02 = b-a;
               int t03 = (t02 / 60)+1;
               s1 = t03.ToString()+" мин.";
               
            }
            
        }


        private void button1_Click(object sender, EventArgs e)
        {
            if (radioButton1.Checked) { b = 1800; srri = 1800 / 60; srrr = Convert.ToString(srri); this.выходToolStripMenuItem1.Enabled = false; timer1.Start(); notifyIcon1.ShowBalloonTip(5000, "RelaxeR", "Время работы за ПК " + srrr + " мин.!\nЧерез данный промежуток времени будет\nпоказано соответствующее сообщение... ", ToolTipIcon.Info); }
            if (radioButton2.Checked) { b = 2700; srri = 2700 / 60; srrr = Convert.ToString(srri); timer1.Start(); notifyIcon1.ShowBalloonTip(5000, "RelaxeR", "Время работы за ПК " + srrr + " мин.!\nЧерез данный промежуток времени будет\nпоказано соответствующее сообщение... ", ToolTipIcon.Info); }
            if (radioButton3.Checked) { b = 3600; srri = 3600 / 60; srrr = Convert.ToString(srri); timer1.Start(); notifyIcon1.ShowBalloonTip(5000, "RelaxeR", "Время работы за ПК " + srrr + " мин.!\nЧерез данный промежуток времени будет\nпоказано соответствующее сообщение... ", ToolTipIcon.Info); }
            radioButton1.Hide();
            radioButton2.Hide();
            radioButton3.Hide();
            label13.Hide();
            checkBox4.Hide();
            textBox1.Visible = false;
            textBox2.Visible = false;
            button1.Hide();
            so = otd*60;
            d = 20;
            this.Hide();
            FormBorderStyle ett = FormBorderStyle.None;
            FormBorderStyle = ett;
            Opacity = 0.7;
            FormWindowState wst = FormWindowState.Maximized;
            WindowState = wst;
            label1.Hide();
            label2.Hide();
            label3.Visible = true;
            label4.Visible = true;
            label5.Visible = false;
            label6.Visible = false;
            label7.Visible = false;
            label8.Visible = false;
            label9.Visible = false;
            label10.Visible = false;
            label11.Visible = false;
            label12.Visible = false;
            checkBox1.Visible = false;
            checkBox2.Visible = false;
            checkBox3.Visible = false;
            button2.Visible = false;
            button3.Visible = false;
            button4.Visible = false;
            
           
            
            
           
            
        } 

       

        

        private void timer2_Tick(object sender, EventArgs e)
        {
            if (c == so)
            {
                timer2.Stop(); c = 0; d = otd;
                this.Hide();
                notifyIcon1.Visible = true;
                timer1.Start();
            }
            else
            {
                notifyIcon1.Visible = false;
                d = otd - (c / 60);
                label4.Text = d + " мин. !!!";
                c = c + 1;
            }

        }

        private void notifyIcon1_MouseDoubleClick(object sender, MouseEventArgs e)
        {
           
        }

        private void contextMenuStrip1_Opening(object sender, CancelEventArgs e)
        {

        }

       

        private void выходToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void оПрограммеToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            Form3 frm3 = new Form3();
            frm3.Show();
        }

        private void времяToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            MessageBox.Show("До вывода полноэкранного сообщения: " + s1, "Время:", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
        }

        private void заметкиToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Zametki zmt = new Zametki();
            zmt.Show();
        }

        private void играToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Form1 f1 = new Form1();
            f1.Show();
        }

             

        public void button2_Click(object sender, EventArgs e)
        {
            try
            {
                rab = Convert.ToInt32(textBox2.Text);
                otd = Convert.ToInt32(textBox1.Text);
                so = otd * 60;
                d = otd;
                b = rab * 60;
                srrr = Convert.ToString(rab);
                timer1.Start();
                notifyIcon1.ShowBalloonTip(5000, "RelaxeR", "Время работы за ПК " + srrr + " минут!\nЧерез данный промежуток времени будет\nпоказано соответствующее сообщение... ", ToolTipIcon.Info);
                radioButton1.Hide();
                radioButton2.Hide();
                radioButton3.Hide();
                label13.Hide();
                checkBox4.Hide();
                textBox1.Visible = false;
                textBox2.Visible = false;
                button1.Hide();
                this.Hide();
                FormBorderStyle ett = FormBorderStyle.None;
                FormBorderStyle = ett;
                Opacity = 0.7;
                FormWindowState wst = FormWindowState.Maximized;
                WindowState = wst;
                label1.Hide();
                label2.Hide();
                label3.Visible = true;
                label4.Visible = true;
                label5.Visible = false;
                label6.Visible = false;
                label7.Visible = false;
                label8.Visible = false;
                label9.Visible = false;
                label10.Visible = false;
                label11.Visible = false;
                label12.Visible = false;
                checkBox1.Visible = false;
                checkBox2.Visible = false;
                checkBox3.Visible = false;
                button2.Visible = false;
                button3.Visible = false;
                button4.Visible = false;
            }
            catch { MessageBox.Show("Текстовые поля должны содержать только целые числа и не быть пустыми!", "Ошибка пользователя", MessageBoxButtons.OK, MessageBoxIcon.Warning); }
        }


        private void checkBox1_CheckedChanged_1(object sender, EventArgs e)
        {
            this.выходToolStripMenuItem1.Enabled = false;
        }

        private void checkBox2_CheckedChanged(object sender, EventArgs e)
        {
            this.заметкиToolStripMenuItem.Enabled = false;
        }

        private void checkBox3_CheckedChanged(object sender, EventArgs e)
        {
            this.играToolStripMenuItem.Enabled = false;
        }

        private void notifyIcon1_Click(object sender, EventArgs e)
        {

        }

        private void notifyIcon1_DoubleClick(object sender, EventArgs e)
        {
            notifyIcon1.ShowBalloonTip(5000, "RelaxeR", "Время работы за ПК " + srrr + " минут!\nЧерез данный промежуток времени будет\nпоказано соответствующее сообщение... ", ToolTipIcon.Info); 
        }

        private void button3_Click(object sender, EventArgs e)
        {
            button3.Visible = false;
            button1.Visible = false;
            button4.Visible = true;
            Form2.ActiveForm.Height = 330;
            
        }

        private void button4_Click(object sender, EventArgs e)
        {
            button1.Visible = true;
            button3.Visible = true;
            button4.Visible = false;
            Form2.ActiveForm.Height = 218;
        }

        private void веббраузерToolStripMenuItem_Click(object sender, EventArgs e)
        {
            FemtoWeb.FW1 fw = new FemtoWeb.FW1();
            fw.Show();
        }

        private void checkBox4_CheckedChanged(object sender, EventArgs e)
        {
            this.веббраузерToolStripMenuItem.Enabled = false;
        }

       

        

    
        
     
    
    }
}
