#include <iostream>

using namespace std;

class Queue {
	int* pep;
	int* imp;
	int* del;
	int Max;
	int Current;
	int CurDel;
public:
	Queue(int a);
	Queue();
	~Queue();
	void Add(int a, int b);
	void Sort();
	void Done();
	void Print();
	void PrintDel();
};
Queue::Queue(int a) {
	pep = new int[a];
	imp = new int[a];
	del = new int[a];
	Max = a;
	Current = 0;
	CurDel = 0;
}
Queue::Queue() {
	Max = 0;
	Current = 0;
	CurDel = 0;
	pep = imp = del = nullptr;
}
Queue::~Queue() {
	delete[] pep;
	delete[] imp;
	delete[] del;
 	Current = 0;
	CurDel = 0;
	Max = 0;
}
void Queue::Sort() {
	for (int i = 0; i < Current; ++i) {
		for (int j = 0; j < Current - 1; ++j) {
			if (imp[j] < imp[j + 1]) {
				swap(imp[j], imp[j + 1]);
				swap(pep[j], pep[j + 1]);
			}
		}
	}
}
void Queue::Add(int Ipep, int Iimp) {
	pep[Current] = Ipep;
	imp[Current] = Iimp;
	++Current;
	Sort();
}
void Queue::Done() {
	cout << "Pep " << pep[0] << " important " << imp[0] << " will deleted" << endl;
	del[CurDel++] = pep[0];
	for (int i = 0; i < Current - 1; ++i) {
		pep[i] = pep[i + 1];
		imp[i] = imp[i + 1];
	}
	Current--;
}
void Queue::Print() {
	for (int i = 0; i < Current; ++i) {
		cout << "Pep " << pep[i] << " important " << imp[i] << endl;
	}
}
void Queue::PrintDel() {
	for (int i = 0; i < CurDel; ++i) {
		cout << "Deleted " << del[i] << " ";
	}
	cout << endl;
}
int main() {
	srand(time(NULL));
	Queue l(10);
	for (int i = 0; i < 7; ++i) {
		int Ipep = rand() % 10;
		int Iimp = rand() % 10;
		l.Add(Ipep, Iimp);
	}
	l.Print();
	cout << "\n\n";
	l.Done();
	l.Done();
	cout << "\n\n";
	l.Print();
	cout << "\n\n";
	l.PrintDel();
	return 0;
}