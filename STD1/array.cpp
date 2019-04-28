#include <iostream>
#include <conio.h>
using namespace std;

int data[100];
int n;

int main()
{
	cout<<"Masukkan jumlah data : ";
	cin>>n;
	cout<<endl;
	for(int i=0;i<=n;i++)
	{
		cout<<"Masukkan data ke : "<<i<<":";
		cin>>data[i];
	}
	cout<<endl;
	cout<<"Data yang dimasukkan : ";
	for(int i=0;i<=n;i++)
	{
		cout<<" "<<data[i];
	}
	getch();
}
