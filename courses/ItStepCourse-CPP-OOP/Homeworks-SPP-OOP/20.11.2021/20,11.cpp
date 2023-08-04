#include <iostream>
#include <vector>
#include <stdexcept>

using namespace std;

template <class T>

class Arr {
	vector <T> list;
public:
	void Add(T elem) {
		list.push_back(elem);
	}
	int getSize() {
		return list.size();
	}
	void setSize(int size) { 
		list.resize(size);
	}
	void Grow(int g) {
		list.resize(list.size() + g);
	}
	string Empty() {
		if (list.empty()) return "Empty";
		else return "Not empty";
	}
	void FreeExtra(int index) {
		list.erase(list.begin() + index, list.end());
		cout << "Cleared" << endl;
	}
	void RemoveAll() {
		list.clear();
		cout << "List has been cleared, list size is " << list.size() << endl;
	}
	auto getAt(int index) {
		if (index < 0 || index > list.size()) {
			throw logic_error("Ass-hand user \n");
		}
		else return list[index];
	}
	void setAt(int index, T elem) {
		if (index < 0 || index > list.size()) {
			throw logic_error("Ass-hand user \n");
		}
		else list[index] = elem;
	}
	int getBound() {
		int count = 0;
		for (auto x : list) {
			if (x != 0) ++count;
			else break;
		}
		return count - 1;
	}
	void Print() {
		for (const auto& x : list) cout << x << " ";
		cout << endl;
	}
	void Append(Arr& adding) {
		list.insert(list.cend(), adding.getStart(), adding.getFinish());
	}
	int& operator[](int index) {
		if (index < 0 || index > list.size()) {
			throw logic_error("Ass-hand user \n");
		}
		else return list[index];
	}
	Arr& operator=(const Arr& a) {
		if (!(this == &a)) {
			if (size != a.size) {
				delete[]list;
			}
		}
		int* dest{ list };
		int* scr{ a.list };
		int* const end{ list + a.list};
		while (dest < end) {
			*dest++ = *scr++;
		}
	}
	void getData() {
		cout << this << endl;
	}
	auto getStart() { return list.begin(); }
	auto getFinish() { return list.end(); }
};

int main() { /
	try {
		Arr<int> list;
		list.getData();
		cout << list.Empty() << endl;
		list.Add(1);
		list.Print();
		Arr<int> arr;
		arr.Add(2);
		arr.Add(3);
		cout << arr.getAt(1) << endl;
		list.Append(arr);
		list.Print();
		list.setAt(2, 9);
		list.Print();
		cout << "Changing size " << endl;
		list.setSize(10);
		list.setAt(7, 9);
		list.Print();
		cout << "Bound is " << list.getBound() << endl;
		cout << list.Empty() << endl;
		list.FreeExtra(5);
		list.Print();
		list.RemoveAll();
		cout << list.Empty() << endl;
		Arr<int> arr1 = arr;
		arr1.Print();
	}
	catch (const exception& e) {
		cout << e.what();
	}
	return 0;
}