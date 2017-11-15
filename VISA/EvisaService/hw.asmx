 <%@ WebService Language="C#" Class="Service1" %>

using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using System.Windows.Forms;
using System.Data;
using Devart.Data.MySql;
namespace EVisaService
{
    /// <summary>
    /// Сводное описание для Service1
    /// </summary>
    [WebService(Namespace = "EVisaService")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
//
    public class Service1 : System.Web.Services.WebService
    {
        public MySqlConnection connection;
        public MySqlDataAdapter dataAdapter;
        public DataSet dataSet = new DataSet();
   //     public string connectstr = "User Id=root;password=XmB@#!1y2;server=localhost;charset=cp1251;database=evisa";
        public string connectstr = "User Id=root;password=;server=localhost;charset=cp1251;database=evisa";
     
        public Service1()
        {
            //InitializeComponent();  
        }


        [WebMethod]
        public DataSet FetchData(string Query)
        {
            try
            {
                connection = new MySqlConnection(connectstr);
                dataAdapter = new MySqlDataAdapter("", connection);
                dataAdapter.SelectCommand.CommandText = Query;
                dataSet.Tables.Clear();
                dataAdapter.Fill(dataSet);
            }
            catch (Exception ex)
            {
                throw new Exception(ex.Message);
            }
            finally
            {
                if (connection != null)
                    connection.Close();
            }
            return dataSet;
        }
////
        [WebMethod]
        public int UpdateAll(string[] str,int dlina)
        {
            int error;
            string Query;
            try
            {
                error = 0;
     connection = new MySqlConnection(connectstr);

     for (int i = 1; i <= dlina; i++)
     {
         Query = "UPDATE anketa SET  status=1, operator='" + str[0] +"'"+ "WHERE id ='" + str[i]+"'";

         MySqlCommand mySqlCommand = connection.CreateCommand();
         mySqlCommand.CommandText = Query;
         connection.Open();
         mySqlCommand.ExecuteNonQuery();
     }
            }
            catch (Exception ex)
            {
                error = -1;
                throw new Exception(ex.Message);
            }
            finally
            {
                if (connection != null)
                    connection.Close();
            }

            return error;
        }
////
        [WebMethod]
        public DataSet GetConsulByLogin(string Query)
        {
            try
            {
                dataAdapter = new MySqlDataAdapter("", connectstr);
                dataAdapter.SelectCommand.CommandText = Query;
                dataSet.Tables.Clear();
                dataAdapter.Fill(dataSet);

                if (dataSet.Tables.Count > 0)
                {
                    connection = new MySqlConnection(connectstr);
                    var i = Convert.ToInt32(dataSet.Tables[0].Rows[0].ItemArray[0]);
                    var s = DateTime.Now.ToString();
                    
                    var str = "UPDATE users SET  LastVisit='" + s + "'" + "WHERE id ='" + i + "'";
                    MySqlCommand mySqlCommand = connection.CreateCommand();
                    mySqlCommand.CommandText = str;
                    connection.Open();
                    mySqlCommand.ExecuteNonQuery();
                }
            }
            catch (Exception)
            {
                //MessageBox.Show("Нет доступа","Ошибка",MessageBoxButtons.OK,MessageBoxIcon.Error);
               // throw new Exception("Нет доступа");
            }
            finally
            {
 
                    if (connection != null) connection.Close();
            }
            return dataSet;
        }
        //
        [WebMethod]
        public DataSet GetElchixonaNomi(string Query)
        {
            try
            {
                connection = new MySqlConnection("User Id=root;password=159753;server=localhost;charset=cp1251;database=consul");
                //              connection = new MySqlConnection("User Id=root;password=rfr051206;server=localhost;database=consul");
                dataAdapter = new MySqlDataAdapter("", connection);
                dataAdapter.SelectCommand.CommandText = Query;
                dataSet.Tables.Clear();
                dataAdapter.Fill(dataSet);
            }
            catch (Exception ex)
            {
                throw new Exception(ex.Message);
            }
            finally
            {
                if (connection != null) connection.Close();
            }
            return dataSet;
        }
        //
    }
}