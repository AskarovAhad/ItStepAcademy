#include <iostream>
#include <algorithm>

using namespace std;

class Set {
private:
	int* arr;
	int size;
public:
	Set(int* arrP, int sizeP) : arr{ new int[sizeP] }, size{ sizeP } {
		if (arrP != nullptr) {
			for (int i = 0; i < sizeP; i++)
			{
				arr[i] = arrP[i];
			}
		}
	}
	Set() : Set{ nullptr, 0 } { }
	Set(const Set& obj) : arr{ new int[obj.size] }, size{ obj.size } {
		for (int i = 0; i < size; i++) {
			arr[i] = obj.arr[i];
		}
	}
	Set(const Set& obj, int num) : arr{ new int[obj.size + 1] }, size{ obj.size + 1 } {
		for (int i = 0; i < size - 1; i++) {
			arr[i] = obj.arr[i];
		}
		arr[size - 1] = num;
	}
	~Set() {
		delete[] arr;
	}
	void setSize(int sizeP) {
		this->size = sizeP;
	}
	int getSize() const {
		return size;
	}
	int* getArr() const {
		return arr;
	}
};
ostream& operator<<(ostream& out, const Set& obj) {
	for (int i = 0; i < obj.getSize(); i++) {
		out << obj.getArr()[i] << " ";
	}
	return out;
}
Set operator+(const Set& obj, int num) {
	for (int i = 0; i < obj.getSize(); i++) {
		if (obj.getArr()[i] == num) {
			return obj;
		}
	}
	return Set(obj, num);
}
Set operator-(Set& obj, int num) {
	for (int i = 0; i < obj.getSize(); i++) {
		if (obj.getArr()[i] == num) {
			swap(obj.getArr()[i], obj.getArr()[obj.getSize() - 1]);
			obj.setSize(obj.getSize() - 1);
			return Set(obj);
		}
	}
	return Set(obj, num);
}
Set operator+ (Set& a, Set& b) {
	int* new_arr = new int[(a.getSize() + b.getSize())];
	int new_size = a.getSize();
	int index = a.getSize();
	for (int i = 0; i < a.getSize(); ++i) {
		new_arr[i] = a.getArr()[i];
	}
	for (int i = 0; i < b.getSize(); ++i) {
		bool flag = true;
		for (int j = 0; j < a.getSize(); ++j) {
			if (b.getArr()[i] == a.getArr()[j]) {
				flag = false;
				break;
			}
		}
		if (flag) {
			new_size++;
			new_arr[index++] = b.getArr()[i];
		}
	}
	return { new_arr, new_size };
}
Set operator*(Set& a, Set& b) {
	int new_size = 0;
	int index = 0;
	for (int i = 0; i < a.getSize(); ++i) {
		for (int j = 0; j < b.getSize(); ++j) {
			if (a.getArr()[i] == b.getArr()[j]) {
				++new_size;
			}
		}
	}
	int* new_arr = new int[new_size];
	for (int i = 0; i < a.getSize(); ++i) {
		for (int j = 0; j < b.getSize(); ++j) {
			if (a.getArr()[i] == b.getArr()[j]) {
				new_arr[index++] = a.getArr()[i];
			}
		}
	}
	return { new_arr, new_size };
}
Set operator/(Set& a, Set& b) {
	int index = 0;
	int new_size = 0;
	for (int i = 0; i < a.getSize(); ++i) {
		bool flag = true;
		for (int j = 0; j < b.getSize(); ++j) {
			if (a.getArr()[i] == b.getArr()[j]) {
				flag = false;
				break;
			}
		}
		if (flag) {
			++new_size;
		}
	}
	int* new_arr = new int[new_size];
	for (int i = 0; i < a.getSize(); ++i) {
		bool flag = true;
		for (int j = 0; j < b.getSize(); ++j) {
			if (a.getArr()[i] == b.getArr()[j]) {
				flag = false;
				break;
			}
		}
		if (flag) {
			new_arr[index++] = a.getArr()[i];
		}
	}
	return { new_arr, new_size };
}

void Menu() {
	cout << "\n1 - add element\n";
	cout << "2 - delete element\n";
	cout << "3 - addition of sets\n";
	cout << "4 - intersection of many\n";
	cout << "0 - exit\n";
}

int main() {
	int p[] = { 3, 1, 4, 5, 9, 10 };
	int p1[] = { 7, 5, 6 ,3, 8, 11, 13 };
	int answer;
	Set set4{ p, 6 };
	Set set5{ p1, 7 };
	cout << endl << set4 << endl;
	cout << set5 << endl;
	Menu();
	cin >> answer;
	while (answer != 0) {
		if (answer == 1) { 
			int a;
			cin >> a;
			Set set{ set4 + a };
			cout << endl;
			cout << set;
		}
		if (answer == 2) { 
			int a;
			cin >> a;
			Set set{ set4 - a };
			cout << endl;
			cout << set;
		}
		if (answer == 3) { 
			Set set{ set4 + set5 };
			cout << endl;
			cout << set;
		}
		if (answer == 4) { 
			Set set{ set4 * set5 };
			cout << endl;
			cout << set;
		}
		if (answer == 5) {
			Set set{ set4 / set5 };
			cout << endl;
			cout << set;
		}
		Menu();
		cin >> answer;
	} 
	return 0;
}