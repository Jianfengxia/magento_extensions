﻿

#pragma checksum "D:\Project\ExpressSearch\ExpressSearch\MainPage.xaml" "{406ea660-64cf-4c82-b6f0-42d48172a799}" "B375E8011DF89E268BF5086C37FCEB3F"
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

namespace ExpressSearch
{
    partial class MainPage : global::Windows.UI.Xaml.Controls.Page, global::Windows.UI.Xaml.Markup.IComponentConnector
    {
        [global::System.CodeDom.Compiler.GeneratedCodeAttribute("Microsoft.Windows.UI.Xaml.Build.Tasks"," 4.0.0.0")]
        [global::System.Diagnostics.DebuggerNonUserCodeAttribute()]
 
        public void Connect(int connectionId, object target)
        {
            switch(connectionId)
            {
            case 1:
                #line 33 "..\..\MainPage.xaml"
                ((global::Windows.UI.Xaml.Controls.Primitives.Selector)(target)).SelectionChanged += this.searchHistory_SelectionChanged;
                 #line default
                 #line hidden
                break;
            case 2:
                #line 34 "..\..\MainPage.xaml"
                ((global::Windows.UI.Xaml.Controls.Primitives.ButtonBase)(target)).Click += this.Button_Click_1;
                 #line default
                 #line hidden
                break;
            case 3:
                #line 23 "..\..\MainPage.xaml"
                ((global::Windows.UI.Xaml.Controls.Primitives.ButtonBase)(target)).Click += this.searchExpress;
                 #line default
                 #line hidden
                break;
            case 4:
                #line 24 "..\..\MainPage.xaml"
                ((global::Windows.UI.Xaml.Controls.Primitives.ButtonBase)(target)).Click += this.selectExpressCompany;
                 #line default
                 #line hidden
                break;
            }
            this._contentLoaded = true;
        }
    }
}

