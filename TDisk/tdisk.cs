using System;
using System.IO;

namespace TestDiskClone
{
    class Program
    {
        static void Main(string[] args)
        {
            // Check for the required arguments
            if (args.Length < 2)
            {
                Console.WriteLine("Usage: TestDiskClone <drive> <file>");
                return;
            }

            // Get the drive and file names
            string driveName = args[0];
            string fileName = args[1];

            // Open the drive
            DriveInfo driveInfo = DriveInfo.GetDriveInfo(driveName);
            FileStream fileStream = new FileStream(fileName, FileMode.Create, FileAccess.Write);

            // Read the data from the drive and write it to the file
            byte[] buffer = new byte[1024];
            int bytesRead;
            while ((bytesRead = driveInfo.Read(buffer)) > 0)
            {
                fileStream.Write(buffer, 0, bytesRead);
            }

            // Close the file
            fileStream.Close();
        }
    }
}

/* 
TestDiskClone <drive> <file>
TestDiskClone C c_drive_clone.img
*/

