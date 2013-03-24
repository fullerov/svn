using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace Реакциометр
{
    public partial class Form1 : Form
    {
        double msek = 0, sek = 0, CurrentResult,BestResult, bres=2000;
        int clc = 0,bclc=0;

        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            button1.Visible = false;
            MessageBox.Show("Реакциометр - программа для измерения реакции,\nчерез вычисление скорости нажатия кнопки мыши.\n\nАвтор: Шаповалов А.А. для Shapovalov.ORG", "О программе", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
        }

        private void button1_MouseMove(object sender, MouseEventArgs e)
        {
            button1.Top += e.Y;
            button1.Left += e.X;
            if (button1.Top < -10 || button1.Top > 105)
                button1.Top = 60;
            if (button1.Left < -85 || button1.Left > 240)
                button1.Left = 115;
          

        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            msek++;
            if (msek == 100)
            {
                msek = 0;
                sek++;
            }
            label1.Text = " " + Convert.ToString(sek) + "," + Convert.ToString(msek);
            label2.Text = "Нажимайте на кнопку!";
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            
        }

        private void timer2_Tick(object sender, EventArgs e)
        {
            msek++;
            if (msek == 5)
            {
                button2.Visible = true;
                label1.Visible = true;
                msek = 0;
                sek=0;
                timer1.Enabled = true;
                timer2.Stop();
                timer1.Start();
                BackColor = Color.Gold;

            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            button5.Visible = true;
          
            string str = label1.Text;
            double res = Convert.ToDouble(str);
            CurrentResult = res;
            timer1.Stop();
            button2.Visible = false;
            BackColor = Color.Red;
            button3.Visible = true;
            label2.Text = "Ваш результат:";
        }

        private void button3_Click(object sender, EventArgs e)
        {
            msek = 0; sek = 0;
            if (CurrentResult < bres)
            {
                string sbest = Convert.ToString(CurrentResult);
                label3.Text = "Лучший результат: " + sbest + " сек.";
                bres = CurrentResult;

            }
            else 
            {
                string sbest = Convert.ToString(bres);
                label3.Text = "Лучший результат: " + sbest + " сек.";
            }
       
            timer2.Start();
            BackColor = Color.DarkSeaGreen;
            label2.Text = "Как только изменится цвет формы, нажмите на красную кнопку";
            label1.Visible = false;
            button3.Visible = false;
            
            label3.Visible = true;
        
        
            

           
            

        }

        private void button4_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            button5.Visible = false;
            button8.Visible = true;
            label1.Visible = false;
            label3.Visible = false;
            timer2.Stop();
            timer1.Stop();
            label2.Text="Нажимай на синюю кнопку!!!";
            timer3.Enabled=true;
            timer3.Start();
            button2.Visible=false;
            button3.Visible=false;
            button6.Visible = true;
            button7.Visible = false;
            clc = 0;
            sek = 0;
            msek = 0;
            
        }

        private void timer3_Tick(object sender, EventArgs e)
        {
            sek++;
           
            label1.Visible = true;
            if (sek == 1)
            {
                
                timer3.Stop();
                
                button6.Visible = false;
                button7.Visible = true;
                string cls=Convert.ToString(clc);
                label2.Text = "Ваш результат " + clc + " клика в секунду ";

            }
            label1.Visible = false;

        }

        private void button6_Click(object sender, EventArgs e)
        {
            
            clc++;
       

        }

        private void button7_Click(object sender, EventArgs e)
        {
            if (clc > bclc)
            {
                bclc = clc;
                string stclc = Convert.ToString(clc);
                label3.Visible = true;
                label3.Text = "Лучший результат " +stclc+ " кликов в секунду";
            }
            else 
            {
                string stclc = Convert.ToString(bclc);
                label3.Visible = true;
                label3.Text = "Лучший результат " + stclc + " кликов в секунду";
            }
            label1.Visible = false;
            button7.Visible = false;
            button6.Visible = true;
            label2.Text="Нажимай на синюю кнопку!!!";
            timer3.Start();
            button2.Visible=false;
            button3.Visible=false;
           
            clc = 0;
            sek = 0;
            msek = 0;
           
        }

        private void button8_Click(object sender, EventArgs e)
        {
            button5.Visible = true;
            button8.Visible = false;
            label3.Visible = false;
            button6.Visible = false;
            button7.Visible = false;
            timer3.Stop();
            msek = 0; sek = 0;
            if (CurrentResult < bres)
            {
                string sbest = Convert.ToString(CurrentResult);
                label3.Text = "Лучший результат: " + sbest + " сек.";
                bres = CurrentResult;

            }
            else
            {
                string sbest = Convert.ToString(bres);
                label3.Text = "Лучший результат: " + sbest + " сек.";
            }

            timer2.Start();
            BackColor = Color.DarkSeaGreen;
            label2.Text = "Как только изменится цвет формы, нажмите на красную кнопку";
            label1.Visible = false;
            button3.Visible = false;

            label3.Visible = true;
        }

        

      
    }
}
