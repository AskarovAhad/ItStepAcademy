//#include <iostream>
//#include <time.h>
//
//using namespace std;
//
//class Queue {
//	int* values;
//	int Max = 3;
//	int Current;
//public:
//	Queue();
//	~Queue();
//	void Fill();
//	void Clear();
//	bool isFull();
//	bool Complain();
//};
//
//Queue::Queue() {
//	values = new int[Max];
//	Current = 0;
//}
//Queue::~Queue() {
//	delete[]values;
//	Current = 0;
//}
//bool Queue::isFull() {
//	return Max == Current;
//}
//void Queue::Fill() {
//	int tries = rand() % 3 + 3;
//	if (!isFull()) {
//		int num = 0;
//		while (tries) {
//			num = rand() % 3 + 1;
//			cout << "-" << num;
//			--tries;
//		}
//		cout << " |  " << Current + 1 << " result " << num << endl;
//		values[Current] = num;
//		Current++;
//	}
//	else {
//		if (Complain()) {
//			cout << "Won!" << endl << endl;
//			Clear();
//		}
//		else {
//			cout << "Lose! " << endl << endl;
//			Clear();
//		}
//	}
//}
//void Queue::Clear() {
//	Current = 0;
//}
//bool Queue::Complain() {
//	for (int i = 0; i < Max; ++i) {
//		for (int j = 0; j < Max; ++j) {
//			if (values[i] != values[j]) {
//				return false;
//				break;
//			}
//		}
//	}
//	return true;
//}
//int main() {
//	srand(time(NULL));
//	int l;
//	Queue list;
//	do {
//		cout << "1 - spin or continue" << endl;
//		cout << "0 - close" << endl;
//		cin >> l;
//		if (l == 1) {
//			list.Fill();
//		}
//	} while (l != 0);
//	return 0;
//}