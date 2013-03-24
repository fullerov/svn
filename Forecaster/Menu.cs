using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace M1
{
    public partial class Menu : Form
    {
        public Menu()
        {
            InitializeComponent();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
            Form1 f1 = new Form1();
            f1.Show();
        }

        private void Menu_Load(object sender, EventArgs e)
        {

        }

        private void button4_Click(object sender, EventArgs e)
        {
            About ab = new About();
            ab.Show();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
            X4 fx4 = new X4();
            fx4.Show();
        }

        private void Menu_MouseMove(object sender, MouseEventArgs e)
        {
            Opacity = 1;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
            x3 fx3 = new x3();
            fx3.Show();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
            FormX2 fx2 = new FormX2();
            fx2.Show();
        }

        private void Menu_MouseLeave(object sender, EventArgs e)
        {
           
        }

        private void button6_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
            FormX6 fx6 = new FormX6();
            fx6.Show();
        }

        private void button7_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
            FormX7 fx7 = new FormX7();
            fx7.Show();
        }

        private void button8_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
            FormX8 fx8 = new FormX8();
            fx8.Show();
        }

        private void button9_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
            Form9X fx9 = new Form9X();
            fx9.Show();
        }

        private void button10_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
            FormX10 fx10 = new FormX10();
            fx10.Show();
        }

        private void button11_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
            FormX12 fx12 = new FormX12();
            fx12.Show();
        }

        private void button12_Click(object sender, EventArgs e)
        {
            Opacity = 0.7;
            FormX24 fx24 = new FormX24();
            fx24.Show();
        }
    }
}
