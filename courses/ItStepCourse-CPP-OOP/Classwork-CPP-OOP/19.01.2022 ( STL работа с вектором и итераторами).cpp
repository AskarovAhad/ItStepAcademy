#include <iostream>
#include <vector>
#include <iterator>
using namespace std;

void ShowVector(vector<string> v) {
	vector<string>::reverse_iterator r_it = v.rbegin();
	vector<string>::iterator it = v.begin();
	for (int i = 0; i < v.size(); i++) {
		cout << *(r_it + i) << " ";
	}
	cout << endl;
	v.insert(it - 1, 1 , "6");
	r_it = v.rbegin();

	for (int i = v.size() - 1; i >= 0; i--) {
		cout << *(r_it + i) << " ";
	}

	cout << endl;
}

int main() {
	vector<string> info = { "A", "B" };
	//cout << info.capacity() << " ";
	ShowVector(info);
	info.resize(5, " ! ");
	//cout << info.capacity() << " ";
	ShowVector(info);
	info.resize(3, " - ");
	ShowVector(info);
	info.resize(6, " - ");
	ShowVector(info);
	//cout << info.size() << endl;
	
	return 0;
}