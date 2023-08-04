Imports System.Windows.Forms

Class CodeEditor
    Private m_root As tk.Tk
    Private m_text As tk.Text
    Private m_menubar As tk.Menu
    Private m_filemenu As tk.Menu
    Private m_open_button As tk.Button
    Private m_save_button As tk.Button
    Private m_statusbar As tk.Label

    Sub New()
        m_root = tk.Tk()
        m_text = tk.Text(m_root)
        m_menubar = tk.Menu(m_root)
        m_filemenu = tk.Menu(m_menubar, tearoff:=False)
        m_filemenu.AddCommand(Label="Open", Command:=Sub() Me.OpenFile())
        m_filemenu.AddCommand(Label="Save", Command:=Sub() Me.SaveFile())
        m_filemenu.AddCommand(Label="Exit", Command:=m_root.Quit)
        m_menubar.AddCascade(Label="File", Menu:=m_filemenu)
        m_toolbar = tk.Frame(m_root)
        m_open_button = tk.Button(m_toolbar, Text="Open", Command:=Sub() Me.OpenFile())
        m_save_button = tk.Button(m_toolbar, Text="Save", Command:=Sub() Me.SaveFile())
        m_statusbar = tk.Label(m_root, Text="Line 1, Column 1")
        m_text.Pack()
        m_menubar.Pack()
        m_toolbar.Pack(Side="Top")
        m_statusbar.Pack(Side="Bottom")
    End Sub

    Sub OpenFile()
        filename = tk.filedialog.askopenfilename()
        If filename <> Nothing Then
            m_text.Delete(1, tk.END)
            With open(filename, "r") As f
                m_text.Insert(1, f.ReadAll())
            End With
        End If
    End Sub

    Sub SaveFile()
        filename = tk.filedialog.asksaveasfilename()
        If filename <> Nothing Then
            With open(filename, "w") As f
                f.Write(m_text.Get(1, tk.END))
            End With
        End If
    End Sub

    Sub Run()
        m_root.MainLoop()
    End Sub

End Class

Sub Main()
    editor = CodeEditor()
    editor.Run()
End Sub

