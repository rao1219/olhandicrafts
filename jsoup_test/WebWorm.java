package jsoup_test;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Scanner;

import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;
public class WebWorm {
	/**
	 * 得到这个content中包含的各个item的url
	 * 
	 * @param content
	 * @return
	 */
	public static int getnum = 0;
	public ArrayList<String> getLinks(String content){
		ArrayList<String> linkStr = new ArrayList<String>();
		Document doc = Jsoup.parse(content);
		Elements Links = doc.select("li");
//		System.out.println(Links.size());
		for(Element link:Links){
			String url = link.getElementsByTag("a").attr("href");
//			System.out.println(url);
			linkStr.add(url);
		}
		return linkStr;
	}
	/**
	 * 从url中获取item数据存入文件中
	 * 
	 * @param url
	 * @param fileName
	 * @throws IOException
	 */
	public void getContentFromResumeToFile(String url, String fileName) throws IOException{
		Document doc=Jsoup.connect(url)  
		        .data("jquery", "java")  
		        .userAgent("Mozilla")  
		        .cookie("auth", "token")  
		        .timeout(50000)  
		        .get();
		doc = Jsoup.parse(doc.toString());
		Element content = doc.select("div.content-word").first();
//		System.out.println("content:"+content.toString());
		appendMethodB(fileName, content.toString());
	}
	/**
	 * 将content追加到file中
	 * 
	 * @param fileName
	 * @param content
	 */
	public void appendMethodB(String fileName, String content) {
        try {
        	content = content.replaceAll("\\<.*?\\>", "");
        	content = content.replaceAll("\n ", "\n");
        	content = content.replaceAll("\n \n", "\n");
//        	System.out.println(content);
            //打开一个写文件器，构造函数中的第二个参数true表示以追加形式写文件
            FileWriter writer = new FileWriter(fileName, true);
            writer.write(content);
            writer.close();
    	    System.out.println("this is " + (getnum++) + " record complete");
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
	/**
	 * 处理一个url页面中的信息
	 * 
	 * @param url
	 * @param fileName
	 * @return 返回下一页的url，以便于翻页爬取
	 * @throws IOException
	 */
	public String getContentOnePage(String url, String fileName) throws IOException, java.lang.IllegalArgumentException{
		String nextPageUrl = "";
		Document doc=Jsoup.connect(url)  
		        .data("jquery", "java")  
		        .userAgent("Mozilla")  
		        .cookie("auth", "token")  
		        .timeout(50000)  
		        .get();
        Elements divs = doc.getElementsByClass("sojob-result-list");
//		System.out.println("divs=="+divs.toString());
        ArrayList<String> resumeLinkList = getLinks(divs.toString());
        for(int i = 0; i < resumeLinkList.size(); i++){
        	getContentFromResumeToFile(resumeLinkList.get(i), fileName);
        }
		String str = doc.select("div.pagerbar").toString();
		doc = Jsoup.parse(str);
		Elements page = doc.getElementsContainingOwnText("下一页");
		nextPageUrl = page.attr("href");
//		System.out.println(nextPageUrl);
		
		return nextPageUrl;
	}
	/**给出网页地址和文件路径，输出制定页数的内容到文件路径(追加形式)
	 * @param url 网页地址
	 * @param filepath 文件路径
	 * @param pageNum 指定页数
	 * @throws IOException
	 */
	public void urlContentToFile(String url , String filepath, int pageNum) {
        while(pageNum-- != 0) {
        	try{
        		url = getContentOnePage(url, filepath);
        	}
        	catch(IOException e){
        		return ;
        	}
        	catch(java.lang.IllegalArgumentException e){
        		return ;
        	}
        }
    }  
	/**递归得到给出的路径下的所有文件
	 * @param path 给出路径
	 * @return 该路径下的所有文件
	 */
	public static List<File> getFiles(String path){
	    File root = new File(path);
	    List<File> files = new ArrayList<File>();
	    if(!root.isDirectory()){
	        files.add(root);
	    }else{
	        File[] subFiles = root.listFiles();
	        for(File f : subFiles){
	            files.addAll(getFiles(f.getAbsolutePath()));
	        }    
	    }
	    return files;
	}
	public static void main(String[] args) throws IOException {
		Scanner fin = new Scanner(new File("文件网址表.txt"));
		WebWorm ww = new WebWorm();
		getnum = 0;
		while(fin.hasNext()){
			String line = fin.nextLine();
//			System.out.println("Line:"+line);
			String[] ss = line.split("#FENGE#");
			String filename = ss[0];
			String filepath = "爬取结果/"+filename+".txt";
			System.out.println("outputfile: " + filepath);
			File file = new File(filepath);
			if(!file.exists())file.createNewFile();
			
			String urls = ss[1];
			String[] url = urls.split(";");
			for(String aurl:url){
//				System.out.print(aurl);
				ww.urlContentToFile(aurl,filepath,2);
			}
		}
		System.out.println("------------------End!------------------");
    }  
}
