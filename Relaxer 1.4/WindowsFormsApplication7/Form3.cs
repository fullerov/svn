using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace WindowsFormsApplication7
{
    public partial class Form3 : Form
    {
        public Form3()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Form4 f4 = new Form4();
            f4.Show();
            this.Close();
        }

        private void Form3_Load(object sender, EventArgs e)
        {
            
        }

        private void Form3_Click(object sender, EventArgs e)
        {
            Ussr usssr = new Ussr();
            usssr.Show();
            this.Close();
        }

        

       

        

        

        

        
    }
}
