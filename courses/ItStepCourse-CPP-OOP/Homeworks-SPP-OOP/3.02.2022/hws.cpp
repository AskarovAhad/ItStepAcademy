#include <iostream>
#include <vector>
#include <iterator>

//это мой авторский 

using namespace std;

void Print(vector<int> a) {
	auto iter = a.begin();
	for (vector<int>::iterator it = a.begin(); it != a.end(); ++it) {
		if (*it > 0) {
			cout << *it << " ";
		}
		else {
			cout << *it;  break;
		}
	}
	cout << endl;
}

int main() {
	vector<int> it;
	for (int i = 0; i < 7; ++i) {
		int a;
		cin >> a;
		it.push_back(a);
	}
	cout << "Right:" << endl;
	for (auto x : it) {
		cout << x << " ";
	}
	cout << endl << "Unright:" << endl;
	Print(it);
	return 0;
}