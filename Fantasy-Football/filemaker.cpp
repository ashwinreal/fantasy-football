#include<fstream>
#include<cstring>
#include<iostream>

using namespace std;

struct data{
	string name;
	string team;
	int points;
	int price;
};

int main()
{
	fstream fd;
	fd.open("forwards.txt",ios::in);
	fstream fd1;

	
	data d;
	int i = 454;
	
	while(!fd.eof())
	{
		string name;
		string team;
		string points;
		string price;
		
		getline(fd,name);
		getline(fd,team);
		getline(fd,points);
		getline(fd,price);
		
		int id=0;
		
		
			if(team=="Chelsea") id = 1; 
			if(team=="Man City")id = 2;
			if(team=="Arsenal") id = 3; 
			if(team=="Man Utd") id = 4; 
			if(team=="Spurs") id = 5; 
			if(team=="Liverpool") id = 6; 
			if(team=="Southampton") id = 7; 
			if(team=="Swansea") id = 8; 
			if(team=="Stoke") id = 9; 
			if(team=="Crystal Palace") id = 10; 
			if(team=="Everton") id = 11; 
			if(team=="West Ham") id = 12; 
			if(team=="West Brom") id = 13; 
			if(team=="Leicester") id = 14; 
			if(team=="Newcastle") id = 15; 
			if(team=="Sunderland") id = 16; 
			if(team=="Aston Villa") id = 17; 
			if(team=="Bournemouth") id = 18; 
			if(team=="Watford") id = 19; 
			if(team=="Norwich") id = 20; 
		
		
		cout<<"insert into PLAYER_TABLE(PLAYER_ID,PLAYER_NAME,CLUB_ID,POSITION,PRICE) values (";
		cout<<i<<", \""<<name<<"\", "<<id<<", \""<<"FW"<<"\", "<<price<<");"<<endl;
		
		i++;
		
		string extra;
		getline(fd,extra);
		getline(fd,extra);	
	}
	
	fd1.close();
	fd.close();
	
	return 0;
}
		
		
