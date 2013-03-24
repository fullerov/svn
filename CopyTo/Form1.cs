using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.IO;
using System.Windows.Forms;

namespace WindowsFormsApplication4
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
           

        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {

                string DestName = textBox2.Text;
                DirectoryInfo dest = new DirectoryInfo(DestName);
                dest.Create();
                string s = textBox1.Text;

                DirectoryInfo dir = new DirectoryInfo(s);
                if (!dir.Exists)
                {
                    MessageBox.Show("Каталог " + dir.Name + " не существует!");
                    return;
                }
                FileInfo[] files = dir.GetFiles("*.jpg");
                foreach (FileInfo f in files)
                    f.CopyTo(dest + f.Name);
                MessageBox.Show("Скопировано " + files.Length + " jpg файлов!");

            }
            catch (Exception exp)
            {
                MessageBox.Show("Ошибка! " + exp.Message);
            }

         }

        private void button2_Click(object sender, EventArgs e)
        {
            try
            {

                string DestName = textBox2.Text;
                DirectoryInfo dest = new DirectoryInfo(DestName);
                dest.Create();
                string s = textBox1.Text;

                DirectoryInfo dir = new DirectoryInfo(s);
                if (!dir.Exists)
                {
                    MessageBox.Show("Каталог " + dir.Name + " не существует!");
                    return;
                }
                FileInfo[] files = dir.GetFiles("*.doc");
                foreach (FileInfo f in files)
                    f.CopyTo(dest + f.Name);
                MessageBox.Show("Скопировано " + files.Length + " doc файлов!");

            }
            catch (Exception exp)
            {
                MessageBox.Show("Ошибка! " + exp.Message);
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            try
            {

                string DestName = textBox2.Text;
                DirectoryInfo dest = new DirectoryInfo(DestName);
                dest.Create();
                string s = textBox1.Text;

                DirectoryInfo dir = new DirectoryInfo(s);
                if (!dir.Exists)
                {
                    MessageBox.Show("Каталог " + dir.Name + " не существует!");
                    return;
                }
                FileInfo[] files = dir.GetFiles("*.txt");
                foreach (FileInfo f in files)
                    f.CopyTo(dest + f.Name);
                MessageBox.Show("Скопировано " + files.Length + " txt файлов!");

            }
            catch (Exception exp)
            {
                MessageBox.Show("Ошибка! " + exp.Message);
            }
        }

        private void button4_Click(object sender, EventArgs e)
        {
            try
            {

                string DestName = textBox2.Text;
                DirectoryInfo dest = new DirectoryInfo(DestName);
                dest.Create();
                string s = textBox1.Text;

                DirectoryInfo dir = new DirectoryInfo(s);
                if (!dir.Exists)
                {
                    MessageBox.Show("Каталог " + dir.Name + " не существует!");
                    return;
                }
                FileInfo[] files = dir.GetFiles("*.bmp");
                foreach (FileInfo f in files)
                    f.CopyTo(dest + f.Name);
                MessageBox.Show("Скопировано " + files.Length + " bmp файлов!");

            }
            catch (Exception exp)
            {
                MessageBox.Show("Ошибка! " + exp.Message);
            }
        }

        private void button5_Click(object sender, EventArgs e)
        {
            try
            {

                string DestName = textBox2.Text;
                DirectoryInfo dest = new DirectoryInfo(DestName);
                dest.Create();
                string s = textBox1.Text;

                DirectoryInfo dir = new DirectoryInfo(s);
                if (!dir.Exists)
                {
                    MessageBox.Show("Каталог " + dir.Name + " не существует!");
                    return;
                }
                FileInfo[] files = dir.GetFiles("*.pdf");
                foreach (FileInfo f in files)
                    f.CopyTo(dest + f.Name);
                MessageBox.Show("Скопировано " + files.Length + " pdf файлов!");

            }
            catch (Exception exp)
            {
                MessageBox.Show("Ошибка! " + exp.Message);
            }
        }

        private void button6_Click(object sender, EventArgs e)
        {
            try
            {

                string DestName = textBox2.Text;
                DirectoryInfo dest = new DirectoryInfo(DestName);
                dest.Create();
                string s = textBox1.Text;

                DirectoryInfo dir = new DirectoryInfo(s);
                if (!dir.Exists)
                {
                    MessageBox.Show("Каталог " + dir.Name + " не существует!");
                    return;
                }
                FileInfo[] files = dir.GetFiles("*.mp3");
                foreach (FileInfo f in files)
                    f.CopyTo(dest + f.Name);
                MessageBox.Show("Скопировано " + files.Length + " mp3 файлов!");

            }
            catch (Exception exp)
            {
                MessageBox.Show("Ошибка! " + exp.Message);
            }
        }

        private void button7_Click(object sender, EventArgs e)
        {
            try
            {

                string DestName = textBox2.Text;
                DirectoryInfo dest = new DirectoryInfo(DestName);
                dest.Create();
                string s = textBox1.Text;

                DirectoryInfo dir = new DirectoryInfo(s);
                if (!dir.Exists)
                {
                    MessageBox.Show("Каталог " + dir.Name + " не существует!");
                    return;
                }
                FileInfo[] files = dir.GetFiles("*.avi");
                foreach (FileInfo f in files)
                    f.CopyTo(dest + f.Name);
                MessageBox.Show("Скопировано " + files.Length + " avi файлов!");

            }
            catch (Exception exp)
            {
                MessageBox.Show("Ошибка! " + exp.Message);
            }
        }

        private void button8_Click(object sender, EventArgs e)
        {
            try
            {
                string st = "*." + textBox3.Text;
                string st2 = "." + textBox3.Text;
                string DestName = textBox2.Text;
                DirectoryInfo dest = new DirectoryInfo(DestName);
                dest.Create();
                string s = textBox1.Text;

                DirectoryInfo dir = new DirectoryInfo(s);
                if (!dir.Exists)
                {
                    MessageBox.Show("Каталог " + dir.Name + " не существует!");
                    return;
                }
                FileInfo[] files = dir.GetFiles(st);
                foreach (FileInfo f in files)
                    f.CopyTo(dest + f.Name);
                MessageBox.Show("Скопировано " + files.Length + st2 + " файлов!");

            }
            catch (Exception exp)
            {
                MessageBox.Show("Ошибка! " + exp.Message);
            }
        }

        private void button9_Click(object sender, EventArgs e)
        {
            try
            {

                string DestName = textBox2.Text;
                DirectoryInfo dest = new DirectoryInfo(DestName);
                dest.Create();
                string s = textBox1.Text;

                DirectoryInfo dir = new DirectoryInfo(s);
                if (!dir.Exists)
                {
                    MessageBox.Show("Каталог " + dir.Name + " не существует!");
                    return;
                }
                FileInfo[] files = dir.GetFiles("*.*");
                foreach (FileInfo f in files)
                    f.CopyTo(dest + f.Name);
                MessageBox.Show("Скопировано " + files.Length + " файлов!");

            }
            catch (Exception exp)
            {
                MessageBox.Show("Ошибка! " + exp.Message);
            }
        }

        private void выходToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void оПрограммеToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Form2 f2 = new Form2();
            f2.Show();
        }

       

       
    }
}
