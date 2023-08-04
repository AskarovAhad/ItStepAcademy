//https://en.cppreference.com/w/cpp/container/list
#include <iostream>
#include <vector>
#include <iterator>
#include <algorithm>
#include <list>
using namespace std;

void ShowList(list<int>& list1) {
	list<int>::iterator it;
	for (it = list1.begin(); it != list1.end(); it++) {
		cout << *it << " ";
	}
	cout << endl;
}

int main() {
	list<int> list1, list2;
	for (int i = 0; i < 10; i++) {
		list1.push_back(i);
		list2.push_front(i);
	}
	ShowList(list1);
	ShowList(list2);
	list1.splice(list1.end(), list1, list1.begin());
	auto it = list2.end(); it--;
	list1.splice(list1.end(), list2, it);
	list2.sort();
	list2.reverse();
	list2.unique();

	return 0;
}