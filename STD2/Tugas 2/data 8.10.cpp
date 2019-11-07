#include <iostream>
#include <conio.h>
#include <stdlib.h>
#include <time.h>
#include <math.h>
using namespace std;

int main ()
{
	//clrscr ();			//hapus layar
	
	const int MAKS = 10;
	int data [MAKS];
	int maks;
	int maka;
	int i;
	//memeperoleh data seara acak
	
	//randomize(data);
	for (int i = 0; i < MAKS; i++)
	data [i] =rand ();
	
	//menampilkan  data dan mencari 
	//data terbesar

	cout << "DATA :"<< endl;
	cout << data [0]<< endl;
	maka = data [0]; 	// isi dengan data pertama
	
	for (i = 1; i < MAKS; i++)
	{
		cout<< data [i]<<endl;
		
		if  (data [i] > maka)
		maka = data [i];
	}
	
	cout << " data terbesar  = " << maka << endl;
}
