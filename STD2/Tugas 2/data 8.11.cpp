#include <iostream>
#include <conio.h>

using namespace std;
int main ()
{
	int i, x, ketemu;
	
	//clrscr();				//hapus layar
	
	int data[] = {5, 100, 20, 31, 77, 88, 99, 20, 55, 1};
	
	cout <<"data yang anda cari :";
	cin >> x;
	
	ketemu = 0;
	for (i = 0; i < sizeof (data) / sizeof (int) ; i++)
	{
		if (data [i] == x )
		{
			ketemu = ! ketemu; 		//ubah menjadi benar
			break;					// keluar dari nol
		}
	}
	if (ketemu)
	cout << "data tersebut ada pada posisi ke-"
		<< i + 1 << endl;
		else
		cout << "data tersebut tidak ada !" << endl;
}
