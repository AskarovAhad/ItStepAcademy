#include <iostream>

using namespace std;

class Stop {
	float* bus;
	float* pep;
	int Max = 24;
	int Current;
public:
	Stop();
	~Stop();
	void Add(float a,float b);
	void Delete();
	float busWait(float c);
	float avgWait(float c);
	void Print();
};
Stop::Stop() {
	bus = new float[Max];
	pep = new float[Max];
	Current = 0;
}
Stop::~Stop() {
	delete[]bus;
	delete[]pep;
	Current = 0;
}
void Stop::Add(float a, float b) {
	bus[Current] = a;
	pep[Current] = b; Current++;
}
float Stop::busWait(float a) {
	float free;
	if (Current != 0 || Current != Max - 1) {
		free = rand() % 2 + 3;
		cout << "Places: " << free << endl;
	}
	else free = 10;
	return a * pep[Current - 1] * (free / a);
}
void Stop::Delete() {
	Current = 0;
}
float Stop::avgWait(float c) {
	return (c * pep[Current - 1]) / 2;
}
void Stop::Print() {
	for (int i = 0; i < Current; ++i) {
		cout << "Bus wait " << bus[i] << " Pep wait " << pep[i] << endl;
	}
}
int main() {
	srand(time(NULL));
	Stop bus; int key;
	do {
		cin >> key;
		if (key == 1) {
			float a, b;
			cout << "Enter bus wait and pep wait ";
			cin >> a >> b;
			bus.Add(a, b);
		}
		if (key == 2) {
			int a;
			cout << "Max pepople on bus stop ";
			cin >> a;
			cout << bus.busWait(a);
		}
		if (key == 3) {
			int a;
			cout << "Max pep on bus stop: ";
			cin >> a;
			cout << bus.avgWait(a);
		}
		if (key == 4) {
			bus.Print();
		}
	} while (key != 0);
	return 0;
}