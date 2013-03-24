using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace WindowsFormsApplication7
{
    public partial class Ussr : Form
    {
        public Ussr()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {
            pictureBox1.Visible = false;
        }

        private void Ussr_Load(object sender, EventArgs e)
        {

        }

        private void Ussr_Click(object sender, EventArgs e)
        {
            pictureBox1.Visible = true ;
        }

        private void richTextBox1_Click(object sender, EventArgs e)
        {
            pictureBox2.Visible = true;
        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {
            pictureBox2.Visible = false;
        }
    }
}
