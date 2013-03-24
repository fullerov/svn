using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.IO;
using System.Windows.Forms;
using System.Net;

namespace FemtoWeb
{
    
    public partial class FW1 : Form
    {
        string put;
    
        public FW1()
        {
            InitializeComponent();
           
        }

     
        

        private void button3_Click(object sender, EventArgs e)
        {
            webBrowser1.Update();
            webBrowser1.Refresh();

        }

       

        private void button6_Click(object sender, EventArgs e)
        {
            webBrowser1.Stop();
        }

        private void button7_Click(object sender, EventArgs e)
        {
            webBrowser1.GoBack();
        }

        private void button8_Click(object sender, EventArgs e)
        {
            webBrowser1.GoForward();
        }

     

        private void webBrowser1_DocumentCompleted(object sender, WebBrowserDocumentCompletedEventArgs e)
        {

        }

        private void webBrowser1_DocumentTitleChanged(object sender, EventArgs e)
        {
            this.Text = webBrowser1.DocumentTitle;
            
        }

        

        private void FW1_Load(object sender, EventArgs e)
        {
           
        }

        private void сохранитьToolStripMenuItem_Click(object sender, EventArgs e)
        {
            try
            {
                webBrowser1.ShowSaveAsDialog();
            }
            catch { }
        }

        private void страницаToolStripMenuItem_Click(object sender, EventArgs e)
        {
            webBrowser1.ShowPropertiesDialog();
        }


        private void печатьToolStripMenuItem_Click(object sender, EventArgs e)
        {

            webBrowser1.Print();
        }

        private void оПрограммеToolStripMenuItem_Click(object sender, EventArgs e)
        {
            FW2 f2 = new FW2();
            f2.Show();
        }

        private void свойстваToolStripMenuItem_Click(object sender, EventArgs e)
        {
            webBrowser1.ShowPageSetupDialog();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {

                webBrowser1.Navigate(textBox1.Text);
            }
            catch { }
        }

        private void toolStripMenuItem2_Click(object sender, EventArgs e)
        {
            groupBox1.Visible = true;
        }

        private void выходToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }


        private void b1_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.yandex.ru/");
            groupBox1.Visible = false;
        }

        private void b3_Click_1(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.rambler.ru/");
            groupBox1.Visible = false;
        }

        private void b10_Click_1(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.google.com/");
            groupBox1.Visible = false;
        }

        private void b17_Click_1(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://ru.yahoo.com/");
            groupBox1.Visible = false;
        }

        private void b8_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://ru.wikipedia.org/wiki/");
            groupBox1.Visible = false;
        }

        private void b5_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://mail.ru/");
            groupBox1.Visible = false;
        }

        private void b4_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://thg.ru/");
            groupBox1.Visible = false;
        }

        private void b11_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.transhumanism-russia.ru/");
            groupBox1.Visible = false;
        }

        private void b9_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.scepsis.ru/");
            groupBox1.Visible = false;
        }

        private void b7_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://astronet.ru/");
            groupBox1.Visible = false;
        }

        private void b12_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://iwantto.org/");
            groupBox1.Visible = false;
        }

        private void b16_Click_1(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.neuromir.tv/");
            groupBox1.Visible = false;
        }

        private void b18_Click_1(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.neurosoc.ru/");
            groupBox1.Visible = false;
        }

        private void b21_Click_1(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://shapovalov.org/");
            groupBox1.Visible = false;
        }

        private void b6_Click_1(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.nanonewsnet.ru/");
            groupBox1.Visible = false;
        }

        private void b2_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.3dnews.ru/");
            groupBox1.Visible = false;
        }

        private void b20_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.hdtv.ru/");
            groupBox1.Visible = false;
        }

        private void b13_Click_1(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.overclockers.ru/");
            groupBox1.Visible = false;
        }

        private void b19_Click_1(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.gametech.ru/");
            groupBox1.Visible = false;
        }

        private void b14_Click_1(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.winline.ru/index.php");
            groupBox1.Visible = false;
        }

        private void b15_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.gotdotnet.ru/");
            groupBox1.Visible = false;
        }

        private void b28_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://slo.ru/");
            groupBox1.Visible = false;
        }

        private void b27_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://roboforum.ru/");
            groupBox1.Visible = false;
        }

        private void b26_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.sat-expert.com/");
            groupBox1.Visible = false;
        }

        private void b25_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://science.mybb2.ru/");
            groupBox1.Visible = false;
        }

        private void b24_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://fb2lib.net.ru/genres.php");
            groupBox1.Visible = false;
        }

        private void b23_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://www.atheism.ru/");
            groupBox1.Visible = false;
        }

        private void b22_Click(object sender, EventArgs e)
        {
            webBrowser1.Navigate("http://m-kalashnikov.livejournal.com/");
            groupBox1.Visible = false;
        }

        private void groupBox1_Enter(object sender, EventArgs e)
        {
            
        }

        private void button2_Click(object sender, EventArgs e)
        {
            groupBox1.Visible = false;
        }

        private void textBox1_TextChanged_1(object sender, EventArgs e)
        {
           
        }

        

        

        private void просмотрToolStripMenuItem_Click(object sender, EventArgs e)
        {
            try
            {
                webBrowser1.ShowPrintPreviewDialog();
            }
            catch { }
        }

       

        private void открытьToolStripMenuItem_Click(object sender, EventArgs e)
        {
            try
            {

                OpenFileDialog openFileDialog1 = new OpenFileDialog();

                openFileDialog1.Filter = "HTML (*.html)|*.html,*.htm| Веб-архив (*.mht)|*.mht";
                openFileDialog1.Title = "Открыть файл:";

              
                if (openFileDialog1.ShowDialog() == DialogResult.OK)
                {
                  put = openFileDialog1.FileName.ToString();
                  textBox1.Text = put;
                    webBrowser1.Navigate(put);
                }

              
            }
            catch { }
            
           
            

          
           




            
        }
        private void webBrowser1_NewWindow(object sender, CancelEventArgs e)
        {
            try
            {
                webBrowser1.Navigate(webBrowser1.StatusText);
                e.Cancel = true;
            }
            catch { }
        }

        

        

        }

        

        

        

        

      

        

       

        

        

        

       

       

        

        

        

        

        

        
        

      

       

      

       

       

       

       

        

       

       

       

        

       

        

        
        

      

        

        


        

       


        
    
 
       

        
    }

