#include <iostream>
#include <cassert>
using namespace std;

class MedalRow {
	char country[4];
	int medals[3];
public:
	static const int gold{ 0 };
	static const int silver{ 1 };
	static const int bronze{ 2 };
	MedalRow(const char* countryP, const int* medalsP) {
		strcpy_s(country, 4, (countryP) ? countryP : "nAn");
		for (int i = 0; i < 3; i++) {
			medals[i] = (medalsP) ? medalsP[i] : 0;
		}
	}
	MedalRow() : MedalRow(nullptr, nullptr) {}
	MedalRow& setCountry(const char* countryP) {
		if (countryP) {
			strcpy_s(country, 4, countryP);
		}
		return *this;
	}
	const char* getCountry() const { return country; }
	int& operator[](int index) {
		assert((index >= 0) && (index < 3) && "Index error");
		return medals[index];
	}
	int operator[](int index) const {
		assert((index >= 0) && (index < 3) && "Index error");
		return medals[index];
	}
	friend ostream& operator<<(ostream& stream, const MedalRow& obj);
};
ostream& operator<<(ostream& stream, const MedalRow& obj) {
	stream << obj.country << ": ";
	for (int i = 0; i < 3; i++) {
		stream << obj.medals[i] << " ";
	}
	stream << endl;
	return stream;
}

class MedalsTable {
	int maxSize;
public:
	MedalsTable(int maxSizeP) : maxSize{ maxSizeP } {}
private:
	MedalRow* medalRows = new MedalRow[maxSize];
	int size;
	int findCountry(const char* country) const {
		for (int i = 0; i < size; i++) {
			if (strcmp(medalRows[i].getCountry(), country) == 0) {
				return i;
			}
		}
		return -1;
	}
public:
	MedalsTable() : size{ 0 } {}
	MedalRow& operator[](const char* country) {
		int index = findCountry(country);
		if (index == -1) {
			assert(size < MedalsTable::maxSize && "Table is full");
			index = size++;
			medalRows[index].setCountry(country);
		}
		return medalRows[index];
	}
	const MedalRow& operator[](const char* country) const {
		int index = findCountry(country);
		assert(index != -1 && "Country not found on table");
		return medalRows[index];
	}
	friend ostream& operator<<(ostream& stream, const MedalsTable& obj);
};
ostream& operator<<(ostream& stream, const MedalsTable& obj) {
	for (int i = 0; i < obj.size; i++) {
		stream << obj.medalRows[i];
	}
	return stream;
}
int main() {
	MedalsTable mt(3);
	cout << "Table 1: \n";
	mt["USA"][MedalRow::gold] = 0;
	mt["USA"][MedalRow::silver] = 0;
	mt["USA"][MedalRow::bronze] = 0;
	mt["UZB"][MedalRow::gold] = 1000;
	mt["UZB"][MedalRow::silver] = 9999;
	mt["UZB"][MedalRow::bronze] = 6666;
	mt["RUS"][MedalRow::gold] = 3;
	mt["RUS"][MedalRow::silver] = 3;
	mt["RUS"][MedalRow::bronze] = 3;

	cout << mt << endl;
	const MedalsTable mt1{ mt };
	cout << mt1;
	return 0;
}