Imports MySql.Data.MySqlClient
Imports Microsoft.VisualBasic.ApplicationServices
Imports Microsoft.Win32

Public Class Form1

    Dim sqlConn As New MySqlConnection
    Dim sqlCmd As New MySqlCommand
    Dim sqlRd As MySqlDataReader
    Dim sqlDt As New DataTable
    Dim DtA As New MySqlDataAdapter
    Dim sqlQuery As String

    Dim server As String = "localhost"
    Dim username As String = "root"
    Dim password As String = "root"
    Dim database As String = "myconnector"

    Private bitmap As Bitmap

    Private Sub updateTable()
        sqlConn.ConnectionString = "server = " + server + ";" + "user id = " + username + ";" _
        + "password = " + password + ";" + "database = " + database

        sqlConn.Open()
        sqlCmd.Connection = sqlConn
        sqlCmd.CommandText = "SELECT * FROM myconnector.myconnector;"

        sqlRd = sqlCmd.ExecuteReader
        sqlDt.Load(sqlRd)
        sqlRd.Close()
        sqlConn.Close()
        DataGridView1.DataSource = sqlDt

    End Sub

    Private Sub btnExit_Click(sender As Object, e As EventArgs) Handles btnExit.Click
        Dim WindowExit As DialogResult

        WindowExit = MessageBox.Show("Confirm if you want to exit", "My SQL Connector", MessageBoxButtons.YesNo, MessageBoxIcon.Question)

        If WindowExit = DialogResult.Yes Then
            Application.Exit()
        End If
    End Sub

    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        updateTable()
    End Sub

    Private Sub btnAdd_Click(sender As Object, e As EventArgs) Handles btnAdd.Click
        sqlConn.ConnectionString = "server = " + server + ";" + "user id = " + username + ";" _
       + "password = " + password + ";" + "database = " + database
        Try

            sqlConn.Open()
            sqlQuery = "INSERT INTO myconnector.myconnector (StudentID, FirstName, LastName, Address, PostCode, Telephone) 
VALUES('" & txtStudentID.Text & "' , '" & txtFirstName.Text & "', '" & txtLastName.Text & "',  '" & txtAddress.Text & "', '" & txtPostCode.Text & "', '" & txtTelephone.Text & "')"

            sqlCmd = New MySqlCommand(sqlQuery, sqlConn)
            sqlRd = sqlCmd.ExecuteReader
            sqlConn.Close()

        Catch ex As Exception
            MessageBox.Show(ex.Message, "My SQL Connector", MessageBoxButtons.OK, MessageBoxIcon.Information)
        Finally
            sqlConn.Dispose()
        End Try

        updateTable()
    End Sub

    Private Sub btnReset_Click(sender As Object, e As EventArgs) Handles btnReset.Click
        Try
            For Each txt In Panel4.Controls
                If TypeOf txt Is TextBox Then
                    txt.text = ""
                End If
            Next
            txtSearch.Text = ""
        Catch ex As Exception
            MessageBox.Show(ex.Message)
        End Try
    End Sub

    Private Sub btnUpdate_Click(sender As Object, e As EventArgs) Handles btnUpdate.Click

    End Sub
End Class