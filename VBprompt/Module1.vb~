Imports System.Collections.Generic
Imports System.ComponentModel
Imports System.Runtime.InteropServices
Imports System.Net.NetworkInformation
Imports System.Net.Sockets
Imports System.Threading
Imports System.Text
Imports System.Drawing
Imports System
Imports System.IO
Imports System.Net
Imports Winsock2005DLL ' For Socket Messeging Purposes

Module Module1

    Dim cmd As String
    Dim dir As String = "C:\Revotron\CLE\bin"
    Dim message As String
    WithEvents SendSock As New Winsock2005DLL.Winsock
    WithEvents ReceiveSock As New Winsock2005DLL.Winsock


    Sub Main()

        Console.ForegroundColor = ConsoleColor.White
        ' App with VIM version 9
        If Directory.Exists("C:\Revotron\CLE") Then
            Console.WriteLine("VIM Panel")
	    Console.WriteLine("https://evrestrgb.github.io")
            Init()
        Else
            Directory.CreateDirectory("C:\Revotron\CLE\bin\Packages")
            Console.WriteLine("VIM Panel")
	    Console.WriteLine("https://evrestrgb.github.io")
            Init()
        End If

    End Sub

    Public Sub Init()

        Console.Title = "Revotron CLE 1.0"
        Console.WriteLine()
        Console.Write("$[" + dir + "]?- ")
        cmd = Console.ReadLine()
        If cmd = "Maninfo" Then
            Console.WriteLine("")
            Console.WriteLine("The Scientists")
        ElseIf cmd.Contains("start") = True Then
            Try
                Dim prstart = Replace(cmd, "start ", "")
                Dim fileloc = "C:\Windows\System32\" + prstart
                System.Diagnostics.Process.Start(fileloc)
            Catch ex As Exception
                Console.WriteLine("")
                Console.WriteLine("Could not find file in C:\Windows\System32. System Halted!")
            End Try
        ElseIf cmd.Contains("migrate ") = True Then
            Dim mloc = Replace(cmd, "migrate ", "")
            dir = mloc
        ElseIf cmd = "hackermode" Then
            hackermode()
        ElseIf cmd.Contains("ping") Then
            Dim addr = Replace(cmd, "ping ", "")
            Console.WriteLine("")
            Try
                If My.Computer.Network.Ping(addr) Then
                    Console.ForegroundColor = ConsoleColor.Green
                    Console.WriteLine("Successful to Ping to " + addr)
                    Console.ForegroundColor = ConsoleColor.White
                Else
                    Console.ForegroundColor = ConsoleColor.Red
                    Console.WriteLine("Failed to GET Response from " + addr)
                    Console.ForegroundColor = ConsoleColor.White
                End If
            Catch
                Console.WriteLine("No respond. Failed!")
            End Try
        ElseIf cmd = "exit" Then
            Console.WriteLine()
            Console.WriteLine("Good Bye!")
            End
        ElseIf cmd = "cls" Or cmd = "clear" Then
            Console.Clear()
        ElseIf cmd = "user" Or cmd = "username" Then
            Console.WriteLine()
            Console.WriteLine(Environment.UserName)
        ElseIf cmd.Contains("download") = True Then
            Try
                Dim tokens As String() = cmd.Split(" ")
                Dim y As Integer = 0
                Console.Write("[")
                For i As Integer = 0 To 30
                    Do While y < i
                        Console.Write("|")
                        y = y + 1
                    Loop
                    System.Threading.Thread.Sleep(100)
                Next
                Console.Write("]")
                My.Computer.Network.DownloadFile(tokens(1), tokens(2))
                Console.ForegroundColor = ConsoleColor.Green
                Console.WriteLine()
                Console.ForegroundColor = ConsoleColor.White
            Catch ex As Exception
                Console.ForegroundColor = ConsoleColor.Red
                Console.WriteLine()
                Console.WriteLine("Make sure you used correct syntax!")
                Console.WriteLine("SYNTAX: download SCHEME(HTTPS/HTTP)://FILE-LOCATION-ONLINE SAVING-FILE-LOCATION")
                Console.ForegroundColor = ConsoleColor.White
            End Try
        ElseIf cmd.ToLower.Contains("rpm") Then
            Console.WriteLine()
            Console.WriteLine("Sorry! Revotron Package Manager is still in development! Try Again Later.")
        ElseIf cmd.ToLower.Contains("mkdir") Then
            Dim tokens As String() = cmd.Split(" ")
            My.Computer.FileSystem.CreateDirectory(dir + "\" + tokens(1))
            Console.WriteLine()
            Console.ForegroundColor = ConsoleColor.Green
            Console.WriteLine("Success while creating native directory!")
            Console.ForegroundColor = ConsoleColor.White
        ElseIf cmd.ToLower.Contains("deldir") Then
            Dim tokens As String() = cmd.Split(" ")
            Try
                Directory.Delete(dir + "\" + tokens(1))
                Console.WriteLine()
                Console.ForegroundColor = ConsoleColor.Green
                Console.WriteLine("Success while deleting native directory!")
                Console.ForegroundColor = ConsoleColor.White
            Catch ex As Exception
                Console.WriteLine()
                Console.ForegroundColor = ConsoleColor.Red
                Console.WriteLine("Error while deleting the content(s) in" + tokens(1))
                Console.ForegroundColor = ConsoleColor.White
            End Try
        ElseIf cmd.ToLower.Contains("delfile") Then
            Dim tokens As String() = cmd.Split(" ")
            Try
                File.Delete(dir + "\" + tokens(1))
                Console.WriteLine()
                Console.ForegroundColor = ConsoleColor.Green
                Console.WriteLine("Success while deleting native file!")
                Console.ForegroundColor = ConsoleColor.White
            Catch ex As Exception
                Console.WriteLine()
                Console.ForegroundColor = ConsoleColor.Red
                Console.WriteLine("Error while deleting the file" + tokens(1))
                Console.ForegroundColor = ConsoleColor.White
            End Try
        ElseIf cmd.toLower.Contains("messenger") Then
            Try
                Dim tokens As String() = cmd.Split(" ")
                messenger(tokens(1), tokens(2), tokens(3))
            Catch ex As Exception
                Console.WriteLine()
                Console.ForegroundColor = ConsoleColor.Red
                Console.WriteLine("Make sure your syntax format is correct!")
                Console.WriteLine("FORMAT: messenger <PORT YOU ARE LISTENING TO> <RECEIVER'S IP ADDRESS> <RECEIVER'S PORT>")
                Console.WriteLine("And don't try to use while the receiver computer is turned off or not listening to a certain port!")
                Console.WriteLine(ex.Message)
                Console.ForegroundColor = ConsoleColor.White
            End Try
        Else
            Console.WriteLine()
            Console.ForegroundColor = ConsoleColor.Red
            Console.WriteLine("Command '" + cmd + "' was not expected as a command!")
            Console.ForegroundColor = ConsoleColor.White
        End If
        Init()
    End Sub

    Public Sub hackermode()

        'This is nothing but some functions which will perforrm administrative functions without the user
        Console.Title = "VIM Panel CLE 1.0 | Hackermode"
        Console.WriteLine()
        Console.Write("$[" + dir + "][")
        Console.ForegroundColor = ConsoleColor.Red
        Console.Write("Hackermode")
        Console.ForegroundColor = ConsoleColor.White
        Console.Write("]?- ")
        cmd = Console.ReadLine()

        If cmd = "exit" Then
            Init()
        Else
            Console.WriteLine()
            Console.ForegroundColor = ConsoleColor.Red
            Console.WriteLine("Command '" + cmd + "' was not expected as a command!")
            Console.ForegroundColor = ConsoleColor.White
        End If

        hackermode()
    End Sub

    Public Sub godmode()

        'Master control of the system

    End Sub

    Public Sub programming()

        'Creation of Revotron CLE Packages will be compiled here.
        'Revotron Packages will be .exe based to be able to run by CLE
        'Later, a specific language like VB.NET, VCS.NET, C++, JavaScript, etc. will be used

        Console.WriteLine()
        Console.WriteLine("Programming in CLE 1.0 is not yet ready and a specific language will be used in future. For now, .exe files will be used as packages! Upload your package into https://revotron.000webhostapp.com/rpm/upload")
        Init()

    End Sub

    Public Sub messenger(PORT, RIP, RPORT)

        'Using NET or LAN options to send messages to client computers through unique ports and using DLL Dependencies
        'Actually all the computers in the network will be client and server both, but we will use an uncertain mode throughout the session

        Try
            ReceiveSock.Listen(Val(PORT))
        Catch ex As Exception
            Console.WriteLine()
            Console.ForegroundColor = ConsoleColor.Red
            Console.WriteLine(ex.Message)
            Console.ForegroundColor = ConsoleColor.White
        End Try

        Try
            SendSock.Connect(RIP, RPORT)
        Catch ex As Exception
            Console.WriteLine()
            Console.ForegroundColor = ConsoleColor.Red
            Console.WriteLine(ex.Message)
            Console.ForegroundColor = ConsoleColor.White
        End Try

        Try
            Console.Write("[Messenger][ME]- ")
            message = Console.ReadLine()
            SendSock.Send(message)
            Console.WriteLine()
            messenger(PORT, RIP, RPORT)
        Catch ex As Exception
            Console.WriteLine()
            Console.ForegroundColor = ConsoleColor.Red
            Console.WriteLine(ex.Message)
            Console.ForegroundColor = ConsoleColor.White
            messenger(PORT, RIP, RPORT)
        End Try

    End Sub

    Private Sub ReceiveSock_ConnectionRequest(sender As Object, e As WinsockClientReceivedEventArgs) Handles ReceiveSock.ConnectionRequest
        ReceiveSock.Accept(e.Client)
    End Sub

    Private Sub ReceiveSock_DataArrival(sender As Object, e As WinsockDataArrivalEventArgs) Handles ReceiveSock.DataArrival
        Dim DataReceived As String = ""
        Try
            ReceiveSock.Get(DataReceived)
            Console.Write("Sender:- ")
            Console.WriteLine(DataReceived)
        Catch ex As Exception
            Console.WriteLine()
            Console.ForegroundColor = ConsoleColor.Red
            Console.WriteLine(ex.Message)
            Console.ForegroundColor = ConsoleColor.White
        End Try
    End Sub
End Module
