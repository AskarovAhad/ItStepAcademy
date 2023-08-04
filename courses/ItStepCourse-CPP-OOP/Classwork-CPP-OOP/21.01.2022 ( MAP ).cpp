//https://en.cppreference.com/w/cpp/container/map
#include <iostream>
#include <vector>
#include <iterator>
#include <algorithm>
#include <list>
#include <map>
using namespace std;

void ShowMap() {


}

int main() {
	map<int, int> int_to_int;
	cout << int_to_int.size() << endl;
	/*if (int_to_int.at(0) == -1) {
		cout << "YES" << endl;
	}*/

	for (int i = 0; i < 10; i++) {
		int_to_int[i] = i + 10;
	}

	int_to_int.erase(5);
	int_to_int.insert(make_pair(15, 25));

	for (auto item : int_to_int) {
		cout << "Key: " << item.first << "Value: " << item.second << endl;
	}

	map<int, int>::iterator it = int_to_int.begin();
	for (; it != int_to_int.end(); it++) {
		cout << "Key: " << it->first << "Value: " << it->second << endl;
	}
	cout << endl << endl;


	return 0;
}