#include <iostream>
#include <conio.h>
#include <iomanip>
using namespace std;

int main()
{
	int i, j, tmp, jumdata;
	
	system("cls");				//hapus layar
	
	int data [] = {5, 100, 20, 31, 77, 88, 99, 20, 55, 1 };
	
	jumdata = sizeof(data) / sizeof(int);
	
	//menampilkan data
	
	cout << "data semula :"<< endl;
	for (i = 0; i < jumdata; i++)
		cout << setw(4) << data [i];
	cout << endl; 				// pindah baris
	
	// mengurutkan data
	
	for (i = 0; i < jumdata-1; i++)
		for (j = i + 1; j < jumdata; j++)
			if (data [i] > data [j])
			{
				tmp = data[i];
				data [i] = data[j];
				data [j] = tmp;
			}
		//menampilkan data
		
		cout << " data setelah diurutkan :" <<endl;
		for  (i = 0; i < jumdata; i++)
			cout << setw(4) << data [i];
		cout << endl; 				// pindah baris
		
}
